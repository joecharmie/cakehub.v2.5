var APIKEY = "3VLMJaxNxqrL9irFAm0RJuJ8ELNry3v9";  
var lati;    //NORTH
var long;  //EAST
var map;
var loc;
var max;
var hw_name;
var hw_address;
var hw_lat;
var hw_lng;
var hw_num;
var hw_url;

//ASSIGNING LOCATION BASED ON USER INPUT
function searchLocation() {   
    tt.services.geocode( {
      key: APIKEY,
      query: document.getElementById('locator').value,
      countrySet: 'PH',
    }).then(function(result) { 

    max = result.results.length;   
 
    // VALIDATING TYPOS
    if (max==0) {
      document.getElementById('hw-desc').innerHTML = "<b class='text-warning'>NON-EXISTING MUNICIPALITY ENTERED.</b>";       
    } 
    else{
      lati = result.results[0].position.lat;
      long = result.results[0].position.lng;      
    }

    loc = { lat: lati, lng: long };
    search();
    })
}

  

//FINDING NEAREST STORE NEAR THE USERS LOCATION
// GETS THE STORE INFORMATION
function search() {  
    tt.services.fuzzySearch({
      key: APIKEY,
      query: "Bakery",
      relatedPois: 'all',
      countrySet: 'PH',
      center: loc,
      radius: 1000,
    }).then(function(result) {


      //DISPLAYS SEARCH RESULTS IN JSON FORMAT AND STORES THE NUMBER OF FOUND STORES TO VARIABLE "max"
      console.log(result);
      max = result.results.length;
    
      // VALIDATES IF THERE ARE NO NEARBY BAKERIES 
      if (max==0) {
        document.getElementById('hw-desc').innerHTML = "<b class='text-warning'>NO AVAILABLE BAKERIES IN AN 1000 RADIUS.</b>";  
      } 

      //VARIABLE ASSIGNMENT FOR RESULTS OBTAINED
      hw_name = result.results[0].poi.name;
      hw_address = result.results[0].address.freeformAddress;
      hw_lat = result.results[0].position.lat;
      hw_lng = result.results[0].position.lng;
      hw_num = result.results[0].poi.phone;
      hw_url= result.results[0].poi.url;    
  
      checker()    
    });
  }



//CHECKS WHETHER THE POI URL AND CONTACT NUMBER ARE AVAILABLE FOR OUTPUT 
//THIS FUNCTION IS THE ONE THAT WRITES THE INFORMATION IN THE DIV WITH ID "hw-desc"

//YOU CAN MANIPULATE THIS AS MUCH AS YOU WANT
function checker(){
    if (hw_num === undefined && hw_url === undefined) {
      document.getElementById('hw-desc').innerHTML = "<b class='text-warning'>BAKERY: </b class='text-warning'>" + hw_name + "<br><b class='text-warning'>ADDRESS: </b class='text-warning'>" + hw_address + "<br><b class='text-warning'>COORDINATES: </b>" +hw_lat+" N, "+hw_lng+" E";
    }
    else if (hw_url === undefined) {
    document.getElementById('hw-desc').innerHTML = "<b class='text-warning'>BAKERY: </b class='text-warning'>" + hw_name + "<br><b class='text-warning'>ADDRESS: </b class='text-warning'>" + hw_address + "<br><b class='text-warning'>COORDINATES: </b>" +hw_lat+" N, "+hw_lng+" E<br><b class='text-warning'>CONTACT NUMBER: </b>"+hw_num;
    }
    else if (hw_num === undefined) {
      document.getElementById('hw-desc').innerHTML = "<b class='text-warning'>BAKERY: </b class='text-warning'>" + hw_name + "<br><b class='text-warning'>ADDRESS: </b class='text-warning'>" + hw_address + "<br><b class='text-warning'>COORDINATES: </b>" +hw_lat+" N, "+hw_lng+" E<br><b class='text-warning'>WEBSITE: </b>"+hw_url;
    } else {   
      document.getElementById('hw-desc').innerHTML = "<b class='text-warning'>BAKERY: </b class='text-warning'>" + hw_name + "<br><b class='text-warning'>ADDRESS: </b class='text-warning'>" + hw_address + "<br><b class='text-warning'>COORDINATES: </b>" +hw_lat+" N, "+hw_lng+" E<br><b class='text-warning'>CONTACT NUMBER: </b>"+hw_num+"<br><b class='text-warning'>WEBSITE: </b>"+hw_url;
    }
  }
  