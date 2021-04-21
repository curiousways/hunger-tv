export default {
  init() {

    var $el = '';
    function iframeLoaded() {
      console.log('triggered');
      var iFrameID = $('#main-ad iframe');
      var $adheight = "";
      if (navigator.userAgent.indexOf("Firefox") > 0) {
        if(iFrameID) {
          // here you can make the height, I delete it first, then I make it again
          $adheight =  $('#main-ad iframe').height();
          console.log ($adheight);

          if ( $adheight < 81) {
            setTimeout(function(){
              iframeLoaded();
            },5000);

          }
         else if ( $adheight < 100 &&  $adheight > 80) {
    $(".holder").addClass("sm-ad");
    $("#fixed-slice").addClass("sm-ad");
    $("header").addClass("sm-ad");
    $("#fixed-slice-2").addClass("sm-ad");
  }
  else {
    $adheight =  $('#main-ad iframe').height();
    console.log ($adheight);
    if ( $adheight < 100 &&  $adheight > 80) {
      $(".holder").addClass("sm-ad");
      $("#fixed-slice").addClass("sm-ad");
      $("header").addClass("sm-ad");
      $("#fixed-slice-2").addClass("sm-ad");
    }
  }

    }


      }
  }
    $( "#main-ad iframe" ).ready(function() {
      console.log('trigger');
iframeLoaded();
  });
    // JavaScript to be fired on the home page
    $(window).scroll(function() {
      var $height = $(window).scrollTop();
      // detect position of the bottom of the element we want the ad to unstick at
      if($height >= 264) {
        if(!$( "#fixed-slice" ).hasClass( "sm-ad" )) {
        if(!$( "#fixed-slice" ).hasClass( "change" )) {
        //  console.log('change-me');
          $("#fixed-slice").addClass("change");
        }
        if(!$( "#fixed-slice-2" ).hasClass( "change" )) {
         //  console.log('change-me');
          $("#fixed-slice-2").addClass("change");
        }
        if(!$( ".holder" ).hasClass( "change" )) {
         //  console.log('change-me');
          $(".holder").addClass("change");
        }
        if(!$( "header" ).hasClass( "change" )) {
        //   console.log('change-me');
          $("header").addClass("change");
        }
        if(!$( "footer" ).hasClass( "change" )) {
        //   console.log('change-me');
          $("footer").addClass("change");
        }
        if(!$( "#fixed-slice-3" ).hasClass( "change" )) {
        //   console.log('change-me');
          $("#fixed-slice-3").addClass("change");
        }

          $el = $('#stick-section');
      var bottom = $el.position().top; // eslint-disable-line
      //console.log ('bottom is');
    //  console.log (bottom);
    //  console.log ($height);
      if ($height >= bottom) {
        if($( "#sticky-ad" ).hasClass( "change" )) {
          //   console.log('change-me');
            $("#sticky-ad").removeClass("change");
          }
      }
      else {
        if(!$( "#sticky-ad" ).hasClass( "change" )) {
          //   console.log('change-me');
            $("#sticky-ad").addClass("change");
          }
      }
      }
    }
      if($height >= 110) {
        if($( "#fixed-slice" ).hasClass( "sm-ad" )) {
        if(!$( "#fixed-slice" ).hasClass( "change" )) {
        //  console.log('change-me');
          $("#fixed-slice").addClass("change");
        }
        if(!$( "#fixed-slice-2" ).hasClass( "change" )) {
         //  console.log('change-me');
          $("#fixed-slice-2").addClass("change");
        }
        if(!$( ".holder" ).hasClass( "change" )) {
         //  console.log('change-me');
          $(".holder").addClass("change");
        }
        if(!$( "header" ).hasClass( "change" )) {
        //   console.log('change-me');
          $("header").addClass("change");
        }
        if(!$( "footer" ).hasClass( "change" )) {
        //   console.log('change-me');
          $("footer").addClass("change");
        }
        if(!$( "#fixed-slice-3" ).hasClass( "change" )) {
        //   console.log('change-me');
          $("#fixed-slice-3").addClass("change");
        }

          $el = $('#stick-section');
      var bottom = $el.position().top; // eslint-disable-line
      //console.log ('bottom is');
    //  console.log (bottom);
    //  console.log ($height);
      if ($height >= bottom) {
        if($( "#sticky-ad" ).hasClass( "change" )) {
          //   console.log('change-me');
            $("#sticky-ad").removeClass("change");
          }
      }
      else {
        if(!$( "#sticky-ad" ).hasClass( "change" )) {
          //   console.log('change-me');
            $("#sticky-ad").addClass("change");
          }
      }
      }
    }
      if($height < 264) {
        if(!$( "#fixed-slice" ).hasClass( "sm-ad" )) {
        if($( "#fixed-slice" ).hasClass( "change" )) {
        //   console.log('change-me-2');
          $("#fixed-slice").removeClass("change");
        }
        if($( "#fixed-slice-2" ).hasClass( "change" )) {
        //   console.log('change-me-2');
          $("#fixed-slice-2").removeClass("change");
        }
        if($( ".holder" ).hasClass( "change" )) {
        //   console.log('change-me-2');
          $(".holder").removeClass("change");
        }
        if($( "header" ).hasClass( "change" )) {
         //  console.log('change-me-2');
          $("header").removeClass("change");
        }
        if($( "footer" ).hasClass( "change" )) {
        //   console.log('change-me-2');
          $("footer").removeClass("change");
        }
        if($( "#fixed-slice-3" ).hasClass( "change" )) {
        //   console.log('change-me-2');
          $("#fixed-slice-3").removeClass("change");
        }
        if($( "#sticky-ad" ).hasClass( "change" )) {
          //   console.log('change-me-2');
            $("#sticky-ad").removeClass("change");
          }
      }
    }
    if($height < 110) {
      if($( "#fixed-slice" ).hasClass( "sm-ad" )) {
      if($( "#fixed-slice" ).hasClass( "change" )) {
      //   console.log('change-me-2');
        $("#fixed-slice").removeClass("change");
      }
      if($( "#fixed-slice-2" ).hasClass( "change" )) {
      //   console.log('change-me-2');
        $("#fixed-slice-2").removeClass("change");
      }
      if($( ".holder" ).hasClass( "change" )) {
      //   console.log('change-me-2');
        $(".holder").removeClass("change");
      }
      if($( "header" ).hasClass( "change" )) {
       //  console.log('change-me-2');
        $("header").removeClass("change");
      }
      if($( "footer" ).hasClass( "change" )) {
      //   console.log('change-me-2');
        $("footer").removeClass("change");
      }
      if($( "#fixed-slice-3" ).hasClass( "change" )) {
      //   console.log('change-me-2');
        $("#fixed-slice-3").removeClass("change");
      }
      if($( "#sticky-ad" ).hasClass( "change" )) {
        //   console.log('change-me-2');
          $("#sticky-ad").removeClass("change");
        }
    }
  }
    })


  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS
  },
};
