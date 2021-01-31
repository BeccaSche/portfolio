
var button = document.getElementById("button")
    button.addEventListener('click', calculateInsurance, false);
       
    function calculateInsurance() {
            var Name = document.getElementById("name").value;
            var Age = Number(document.getElementById("age").value);
            var PS = Number(document.getElementById("ps").value);
            var Nation = document.getElementById("country").value;
            
            if (Nation == "Austria") {
                var insurance = Number(PS * 100 / Age + 50)
            } else if (Nation == "Hungary") {
                var insurance = Number(PS * 120 / Age + 100)
            } else if (Nation == "Greece") {
                var insurance = Number(PS * 150 / (Age + 3) + 50)
            } else {
               document.querySelector("#country").style.color = "red" 
            }

            var insuranceRound = Math.round(insurance);
            console.log(insuranceRound)

           var text = `<p>${Name}, your insurance is <b> € ${insuranceRound}<b>`;
            document.getElementById("result").innerHTML = text;
         
        }
