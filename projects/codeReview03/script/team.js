class employee {
  name = "";
  role = "";
  email = "";
  hobby = "";
  imgSrc = "";

  constructor(name, role, email, hobby, imgSrc) {
    this.name = name;
    this.role = role;
    this.email = email;
    this.hobby = hobby;
    this.imgSrc = imgSrc;
  }

addTeam(){
  document.getElementById("imgcontainer").innerHTML += `
  <div class="fig">
      <img class="figImg" src="${this.imgSrc}" alt="">      
      
      <p class="emplName">${this.name}</p>

      <p class="emplRole">${this.role}</p>

      <p class="email">Contact: ${this.email}</p>

      <p class="myHobby">When I'm not working, I'm  ${this.hobby}</p>
  </div>` 
  }
}

let employees = [
new employee("Kermit the Frog", "CEO", "kermit@cfinsurance.at", "Singing", "./img/kermit.jpg"),
new employee("Miss Piggy", "CFO", "piggy@cfinsurance.at", "Reading", "./img/misspiggy.jpg"),
new employee("Fozzy the Bear", "Consultant", "fozzy@cfinsurance.at", "Golfing", "./img/fozzy.jpg"),
new employee("Gonzo", "Technical Advisor", "gonzo@cfinsurance.at", "Cooking", "./img/gonzo.jpg"),
new employee("Animal", "Head of Marketing", "animal@cfinsurance.at", "Painting", "./img/animal.jpg")
];

for (let member of employees){
  member.addTeam();
}

