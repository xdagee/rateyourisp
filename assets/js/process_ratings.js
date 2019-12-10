$(document).ready(function() {
  $("#ratingsForm").on("submit", function(e) {
    e.preventDefault();

    var telco = $("#telco").val();
    var region = $("#region").val();
    var area = $("#area").val();
    var reliability = getReliabilityVal(
      document.getElementById("ratingsForm"),
      "reliability"
    );
    var pricing = getPricingVal(
      document.getElementById("ratingsForm"),
      "pricing"
    );
    var support = getSupportVal(
      document.getElementById("ratingsForm"),
      "support"
    );

    $.ajax({
      type: "POST",
      url: "process_ratings.php",
      data: {
        telco: telco,
        region: region,
        area: area,
        reliability: reliability,
        pricing: pricing,
        support: support
      },

      success: function(data) {
        Swal.fire({
          icon: "success",
          title: "Success",
          text:
            "You have successfully submitted ratings, kindly check back later for the completed results"
        });

        $("#ratingsForm")[0].reset();
      },

      error: function(data) {
        Swal.fire({
          icon: "error",
          title: "Oops...",
          text: "sorry, something went wrong! please try again"
        });
      }
    });
  });

  // a func to get the value of the reliability
  function getReliabilityVal(form, name) {
    // create a variable val
    var val;

    // another variable to get a list the radio buttons
    var radios = form.elements[name];

    //
    for (var i = 0, len = radios.length; i < len; i++) {
      if (radios[i].checked) {
        // is radio checked (selected)?
        val = radios[i].value; // if yes, then let's go.. hold the value in val
        break; // and get out. we're done.
      }
    }

    // call val again
    return val; // return the value of the checked radio button else tell me
  }

  // get pricing value
  function getPricingVal(form, name) {
    var val;
    var radios = form.elements[name];
    for (var i = 0, len = radios.length; i < len; i++) {
      if (radios[i].checked) {
        val = radios[i].value;
        break;
      }
    }
    return val;
  }

  // get support value
  function getSupportVal(form, name) {
    var val;
    var radios = form.elements[name];
    for (var i = 0, len = radios.length; i < len; i++) {
      if (radios[i].checked) {
        val = radios[i].value;
        break;
      }
    }
    return val;
  }
});
