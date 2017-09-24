<? php
    // public function play(){
        function generateDeck(){
            $cards = array();
            for($i=0;$i<52;$i++){
                array.push($cards,$i);
            }
            shuffle($cards);
        }
        
        function cardMap($num){
            $cardValue = ($num%13)+1;
            $cardSuit = floor($num/13);
            $suitStr ="";
            switch($cardSuit){
                case 0:
                    $suitStr = "clubs";
                    break;
                case 1:
                    $suitStr = "hearts";
                    break;
                case 2:
                    $suitStr = "diamonds";
                    break;
                case 3:
                    $suitStr = "spades";
                    break;
            }
            $card = array(
                'num' =>$cardValue,
                'suit' => $cardSuit,
                'imgURL' => "./cards/" .$suitStr."/".$cardValue.".png"
                );
        }
        
        function generateHand($deck){
            $hand=array();
            for($i=0;$i<2;$i++){
                $card = array_pop($deck);
                array_push($hand, $card);
            }
        }
      
        $person = array(
            "name" => "Nathan", 
            "profilePicUrl" => "./profile_pics/Nathan_Levis.png", 
            "cards" => generateHand($deck);
            ); 
            
        function displayPerson($person) {
            // show profile pic
            echo "<img src='".$person["profilePicUrl"]."'>"; 
            
            
            // iterate through $person's "cards"
            
            for($i = 0; $i < count($person["cards"]); $i++) {
                $card = $person["cards"][$i];
                
                // translate this to HTML 
                echo "<img src='".$card["imgURL"]."'>"; 
            }
            
            echo calculateHandValue($person["cards"]); 
        }
        
        
        function calculateHandValue($cards) {
            $sum = 0; 
            
            foreach ($cards as $card) {
                $sum += $card["num"]; 
            }
            
            return $sum; 
        }
        
        
        displayPerson($person); 
    // }
?>