<?php

use Core\RoutesProvider;
use Core\SessionProvider;
use Models\Overall;

RoutesProvider::server(function ($method, $request) {
  if ($method === 'GET') {
    $totalBalance = 0;
    $currentDate = sprintf('%04d-%02d-%02d', date('Y'), date('m'), date('d'));
    $secUser = SessionProvider::get('user');
    $secView = SessionProvider::get('app');
    $dataSet = [];
    $databaseDate = Overall::getDateAll($secUser->ID);
    $calculatedDataset = [];

    if (isset($request->date)) {
      $dataSet = Overall::where($secUser->ID, $request->date);
      $currentDate = $request->date;
    } else {
      $dataSet = Overall::where($secUser->ID, $currentDate);
    }

    if (isset($request->description, $request->amount, $request->type, $request->date)) {
      Overall::new([
        'userId' => $secUser->ID,
        'desc' => $request->description,
        'income' => $request->type === 'income' ? $request->amount : 0,
        'expense' => $request->type === 'expense' ? $request->amount : 0,
        'date' => $request->date
      ]);
      redirect('/app?user=' . $secUser->USER_NAME . '&view=' . $secView->view  . '&date=' . $request->date);
      exit();
    }

    if (isset($request->description, $request->income, $request->expense, $request->id)) {
      Overall::update([
        'id' => $request->id,
        'desc' => $request->description,
        'income' => $request->income,
        'expense' => $request->expense,
      ]);
      redirect('/app?user=' . $secUser->USER_NAME . '&view=' . $secView->view . '&date=' . $request->date);
      exit();
    }

    if (isset($request->delete)) {
      Overall::delete($request->delete);
      redirect('/app?user=' . $secUser->USER_NAME . '&view=' . $secView->view . '&date=' . $request->date);
      exit();
    }

    if (isset($request->view)) {
      foreach ($dataSet as $data) {
        $income = $data['INCOME'];
        $expense = $data['EXPENSE'];
        $balance = $totalBalance + $income - $expense;
        $totalBalance = $balance;
        array_push($calculatedDataset, [
          'ID' => $data['ID'],
          'DESCRIPTION' => $data['DESCRIPTION'],
          'INCOME' => $income,
          'EXPENSE' => $expense,
          'DATE' => $data['DATE'],
          'BALANCE' => $balance
        ]);
      }
      if ($request->view === 'overall') {
        SessionProvider::set('app', ['view' => 'overall']);
        $secView->view = "overall";
      } elseif ($request->view === 'reverse') {
        SessionProvider::set('app', ['view' => 'reverse']);
        $calculatedDataset = array_reverse($calculatedDataset);
        $secView->view = "reverse";
      } else {
        SessionProvider::set('app', ['view' => 'overall']);
        redirect('/app?user=' . $secUser->USER_NAME . '&view=' . $secView->view . '&date=' . $request->date);
        exit();
      }
    }

    view('app', [
      'username' => $secUser->USER_NAME,
      'totalBalance' => $totalBalance,
      'dataSet' => $calculatedDataset,
      'userId' => $secUser->ID,
      'view' => $secView->view,
      'currentDate' => $currentDate,
      'databaseDate' => $databaseDate
    ]);
  }
});
