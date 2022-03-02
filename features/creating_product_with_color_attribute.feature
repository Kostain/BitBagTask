@managing_products_color
Feature: Adding a color attribute to product
    In order to be able to selling products with different colors
    As an Administrator
    I want to add a new color attribute to products

    @ui
    Scenario: I want to add an red t-shirt to the store as a simple product
        Given I am logged in as an administrator
        When I go to the products list
        And I choose simple product from create menu
        And I fill "Code" with "red_t_shirt"
        And I fill "Name" with "Red T-Shirt"
        And I fill "Color" with "Red"
        And I create that product
        Then I should be notified that it has been successfully created
