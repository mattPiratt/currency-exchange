# Recruitment test "Currency Exchange"

Write a code sample that meets the following business requirements:

- Solution modeled in the DomainDrivenDesign convention
- PHP version 8
- Framework Agnostic
- Entirely tested with unit tests

Assumptions:

- The following exchange rates exist:
    - EUR -> GBP 1.5678
    - GBP -> EUR 1.5432
- A fee of 1% of the amount is charged to the customer:
    - Paid out to the customer in the case of a sale
    - Collected from the customer in the case of a purchase

Cases:

- The customer sells 100 EUR for GBP
- The customer buys 100 GBP for EUR
- The customer sells 100 GBP for EUR
- The customer buys 100 EUR for GBP

How to run:

- `composer install`
- `composer test`
- `composer stan`
