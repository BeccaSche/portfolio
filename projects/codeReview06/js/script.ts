let restaurants:Array<any>=[];
let events:Array<any>=[];


class Local{
	locImg="";
	cityZip="";
	streetNum="";

	constructor(locImg, cityZip, streetNum){
		this.locImg = locImg;
		this.cityZip = cityZip;
		this.streetNum = streetNum;
	}

	display(){
		return `<img src="${this.locImg}" class="img-fluid d-sm-none d-md-block">
      			<div class="mx-1">${this.cityZip}<br>${this.streetNum}<br>`;
	}
}

  
class Restaurant extends Local{
	name; teleNum; type; webAdd; changes;

	constructor(locImg, cityZip, streetNum, name, teleNum, type, webAdd, changes){
		super(locImg, cityZip, streetNum);
		this.name = name;
		this.teleNum = teleNum;
		this.type = type;
		this.webAdd = webAdd;
		this.changes = changes;
		restaurants.push(this);
		
	}

	display(){
		return `<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
				<h5 class="mb-1">${this.name}</h5>
				<h6 class="text-primary">${this.type}</h6>
				${super.display()}
				Tele: ${this.teleNum}<br>
				<a href="http://www.${this.webAdd}">${this.webAdd}</a></div>
				<p class="text-right d-sm-none d-md-block"><small class="text-muted">Last updated ${this.changes}</small></p>
				</div>`;
	}

}



class Eventy extends Local{
	name; date; time; ticketPrice; webAdd; changes;

	constructor(locImg, cityZip, streetNum, name, date, time, ticketPrice, webAdd, changes){
		super(locImg, cityZip, streetNum);
		this.name = name;
		this.date = date;
		this.time = time;
		this.ticketPrice = ticketPrice;
		this.webAdd = webAdd;
		this.changes = changes;
		events.push(this);
		
	}

	display(){
		return `<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
				<h5 class="mb-1">${this.name}</h5>
				<h6 class="text-primary">${this.date}</h6>
				${super.display()}
				Start: ${this.time}<br>
				Price: ${this.ticketPrice}<br>
				<a href="http://www.${this.webAdd}">${this.webAdd}</a></div>
				<p class="text-right d-sm-none d-md-block"><small class="text-muted">Last updated ${this.changes}</small></p>
				</div>`;
	}
}


var restaurant1 = new Restaurant("img/kronenhalle.jpg", "Zurich 8001", "Rämistrasse 4", "Restaurant Kronenhalle", "+41 442629900", "Swiss Fine Dining", "kronenhalle.ch", "24.04.2020 12:45");
var restaurant2 = new Restaurant("img/ziegelhuette.jpg", "Zurich 8051", "Hüttenkopfstrasse 70", "Wirtschaft Ziegelhütte", "+41 443224003", "Creative Swiss Cuisine", "wirtschaft-ziegelhuette.ch", "02.05.2020 10:20");
var restaurant3 = new Restaurant("img/fraugerold.jpg", "Zurich 8005", "Geroldstrasse 23", "Frau Gerolds Garten", "+41 789716764", "Bar, Take Away & Garden", "fraugerold.ch","10.02.2020 08:02");
var restaurant4 = new Restaurant("img/paradiso.jpg", "Zurich 8037", "Wasserwerkstrasse 89", "Stazione Paradiso", "+41 781234567", "Focacceria & Bar", "stazioneparadiso.ch", "10.12.2019 18:14");
var restaurant5 = new Restaurant("img/taverne.jpg", "Zurich 8001", "Glockengasse 8", "Neue Taverne", "+41 442211262", "Vegetarian/Vegan", "neuetaverne.ch", "11.06.2020 14:35");
var restaurant6 = new Restaurant("img/saigon.jpg", "Zurich 8001", "Sihlstrasse 97", "Saigon", "+41 442100585", "Vietnamese", "saigon.ch", "02.05.2020 10:20");
var restaurant7 = new Restaurant("img/josef.jpg", "Zurich 8005", "Gasometerstrasse 24", "Restaurant Josef", "+41 442716595", "Small plates", "josef.ch", "04.05.2020 13:44");
var restaurant8 = new Restaurant("img/guel.jpg", "Zurich 8004", "Tellstrasse 22", "Gül Restoran", "+41 444319090", "Modern Turkisch", "guel.ch","10.02.2020 08:02");



var event1 = new Eventy("img/longNight.jpg", "Zurich 8001", "All over town", "Long Night of Museums", "05.09.20", "17:00 h", "€ 30.-", "langenacht.ch", "04.05.2020 13:44");
var event2 = new Eventy("img/streetParade.jpg", "Zurich 8001", "Lake area", "Street Parade", "Cancelled", "13:00 h", "Free entry", "streetparade.com", "10.05.2020 13:48");
var event3 = new Eventy("img/sechse.jpg", "Zurich 8001", "Sechseläutenplatz", "Sechseläuten", "19.04.21", "15:00 h", "Free entry", "sechselauten.ch", "09.06.2020 14:11");
var event4 = new Eventy("img/limmat.jpg", "Zurich 8001", "Limmat River", "Limmat Swimming", "21.08.21", "14:00 h", "€ 40.- p.p.", "limmatschwimmen.ch", "11.06.2020 14:35");
var event5 = new Eventy("img/market.jpg", "Zurich 8001", "Sechseläutenplatz", "Christmas Market Opera", "23.11.-23.12.20", "Daily 11 - 22 h", "Free Entry", "wienachtsdorf.ch", "09.06.2020 14:16");
var event6 = new Eventy("img/zff.jpg", "Zurich 8002", "Bederstrasse 51", "Zurich Film Festival", "24.09.-04.10.20", "variates", "from € 25.-", "zff.com", "15.06.2020 09:24");





for (let i = 0; i<restaurants.length; i++) {
		document.getElementById("showRestaurants").innerHTML+= restaurants[i].display();
}

for (let i = 0; i<events.length; i++) {
		document.getElementById("showEvents").innerHTML+= events[i].display();

}