<?php

class Randomizer {
  function pattern() {
    return rand(1, 2);
  }
  function operand() {
    return rand(0, 9);
  }
  function operator() {
    return rand(1, 3);
  }
}
