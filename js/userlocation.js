$.getJSON("https://api.ipify.org",{"format": "json"}, function(data){
    $.ajax({
      type :'GET',
      url : 'https://api.ipgeolocation.io/ipgeo',
      data:{
        "apiKey" : "",
        "ip" : data.ip
      },
      success : function(data){
        //console.log(data);

        let p =  document.createElement("p");
        p.innerText = "Votre localisation est : " + data.city + "," + data.country_name;
        console.log("Votre localisation est : " + data.city + "," + data.country_name);
        $(".footer").append(p);

      }
    });
});
