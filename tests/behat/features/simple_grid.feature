Feature: Simple Grid

Scenario: A simple grid 2x2
  Given a grid with format:
  """
  2 2
  * .
  * *
  """
  When A generation happens
  Then I have:
  """
  2 2
  * *
  * *
  """
