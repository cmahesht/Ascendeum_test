<!DOCTYPE html>
<html>
<body>


<div>Welcome to Lucky 7 Game </div>

<?php

class lucky_game {

    protected $initialBalance;
    protected $totalBalance;
    protected $dice1Number;
    protected $dice2Number;
    protected $betAmt;
    protected $chosenOption;
    
    public function __construct() {

        $this->initialBalance = 100;
        $this->totalBalance = $this->initialBalance;
        $this->betAmt = 10;
    }

    public function reset() {
        $this->initialBalance = 100;
        $this->totalBalance = $this->initialBalance;
    }

    public function choseOption($option){
        $this->chosenOption = $option;
    }

    public function diceRoll($num1, $num2){
        $this->dice1Number = $num1;
        $this->dice2Number = $num2;
        

    }

    public function result() {
    
        if($this->totalBalance < 10){
            echo "Not enough balance";
            return false;
        }
        
        $this->totalBalance -= 10;

        switch ($this->chosenOption) {
            case 1:
                $result = $this->checkBelow7();
                break;
            case 2:
                $result = $this->checkAbove7();
                break;
            case 3:
                $result = $this->check7();
                break;
        }

        if($result){
            echo "Congratulations! You win! Your balance in now ".$this->totalBalance." Rs.";
            return true;
        }

        echo "Lose Rs. ".$this->betAmt. "(Total Balance: Rs. ".$this->totalBalance.")";
        return false;
        
    }

    public function checkBelow7(){

        $sumOfDiceRoll = $this->dice1Number + $this->dice2Number;

        if($sumOfDiceRoll < 7){
            $this->totalBalance += 20;
            return true;
        }

        return false;
    }

    public function checkAbove7(){
        $sumOfDiceRoll = $this->dice1Number + $this->dice2Number;

        if($sumOfDiceRoll > 7){
            $this->totalBalance += 20;
            return true;
        }
        return false;
    }

    public function check7(){
        $sumOfDiceRoll = $this->dice1Number + $this->dice2Number;

        if($sumOfDiceRoll == 7){
            $this->totalBalance += 30;
            return true;
        }
        return false;
    }
}

$luckyGame = new lucky_game();

$luckyGame->choseOption(1);
$luckyGame->diceRoll(1, 2);
$luckyGame->result();
$luckyGame->reset();


?>

</body>
</html>
