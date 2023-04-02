<script>
  class BalanceFormatter {
    static format(value) {
      const formatter = new Intl.NumberFormat('my-MM', {
        style: 'currency',
        currency: 'MMK',
        minimumFractionDigits: 0
      });

      return formatter.format(value).replace('MMK', '') + ' MMK';
    }
  }
</script>

<?php
#! if you want to use php class, and don't want to use js, here is the class
#! open php.ini
#! Uncomment the line ;extension=intl by removing the semicolon at the beginning.
#! Save the php.ini file.


class BalanceFormatter
{
  public static function format($value)
  {
    $formatter = new NumberFormatter('my_MM', NumberFormatter::CURRENCY);
    $formatter->setTextAttribute(NumberFormatter::CURRENCY_CODE, 'MMK');
    return $formatter->formatCurrency($value, 'MMK');
  }
}
?>