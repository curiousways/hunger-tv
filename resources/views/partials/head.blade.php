<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  @php wp_head() @endphp


  <script async='async' src='https://www.googletagservices.com/tag/js/gpt.js'></script>
  <script>
    var googletag = googletag || {};
    googletag.cmd = googletag.cmd || [];
  </script>

  <script>

var adslot0;

var adslota0;

var adslotb0;

var adslotc0;

var w = window.innerWidth;


if (w <= 1024 ) {
  console.log ('mobiles');
  googletag.cmd.push(function() {

// Declare any slots initially present on the page
// adslot0 = googletag.defineSlot('/6355419/Travel', [728, 90], 'leaderboard').

 adslotc0 =  googletag.defineSlot('/64193083/MOB_MPU_LEADER', [[320, 50], [300, 250]], 'div-gpt-ad-1529145936494-0').
       setTargeting("test3","infinitescroll3").
       addService(googletag.pubads());




// adslot2 =  googletag.defineSlot('/64193083/BILLBOARD_LEADERBOARD', [[970, 250], [728, 90]], 'div-gpt-ad-1529145463897-0').
//     setTargeting("test","infinitescroll").
//     addService(googletag.pubads());



 addslothero3 = googletag.defineSlot('/64193083/MOB_MPU_LEADER', [[320, 50], [300, 250]], 'div-gpt-ad-1529145936494-0').
  // setTargeting("test","infinitescroll").
  addService(googletag.pubads());

// Infinite scroll requires SRA
googletag.pubads().enableSingleRequest();

// Disable initial load, we will use refresh() to fetch ads.
// Calling this function means that display() calls just
// register the slot as ready, but do not fetch ads for it.
googletag.pubads().disableInitialLoad();

// Enable services
googletag.enableServices();
});

// Function to generate unique names for slots
var nextSlot3Id = 1;
 function generateNextSlotName3() {
   var id3 = nextSlot3Id++;
   return 'adslotc' + id3;
 }

// Function to add content to page, mimics real infinite scroll
// but keeps it much simpler from a code perspective.

 var counter3;
  counter3 = 0;

 function moreContent3() {
console.log ('here we are');
   // Generate next slot name
   var slotName3 = generateNextSlotName3();

   // Create a div for the slot
   var slotDiv3 = document.createElement('div');
   slotDiv3.id = slotName3; // Id must be the same as slotName
 //  document.body.appendChild(slotDiv);
 if( counter3 == 0 )
{

//console.log ('hey');
   counter3 = 1;
}
 document.getElementsByClassName("replace-me3")[counter3].appendChild(slotDiv3);
 //console.log (counter);
 counter3 = counter3 + 1;
 //console.log (counter);
   // Create and add fake content 1
  // var h1=document.createElement("H2")
  // var text1=document.createTextNode("Dynamic Fake Content 1");
 //  h1.appendChild(text1);
 //  document.body.appendChild(h1);

   // Create and add fake content 2
 //  var h2=document.createElement("H2")
 //  var text2=document.createTextNode("Dynamic Fake Content 2");
 //  h2.appendChild(text2);
 //  document.body.appendChild(h2);

   // Define the slot itself, call display() to
   // register the div and refresh() to fetch ad.
   googletag.cmd.push(function() {
     var slot3 = googletag.defineSlot('/64193083/MOB_MPU_LEADER', [[320, 50], [300, 250]], slotName3).
        setTargeting("test3","infinitescroll3").
         addService(googletag.pubads());

     // Display has to be called before
     // refresh and after the slot div is in the page.
     googletag.display(slotName3);
     googletag.pubads().refresh([slot3]);
   });
}
}

else if (w > 1024 ) {

 googletag.cmd.push(function() {

   // Declare any slots initially present on the page
  // adslot0 = googletag.defineSlot('/6355419/Travel', [728, 90], 'leaderboard').
   adslot0 =  googletag.defineSlot('/64193083/BILLBOARD_LEADERBOARD_BF', [[970, 250], [728, 90]], 'div-gpt-ad-1532355911205-0').
       setTargeting("test","infinitescroll").
       addService(googletag.pubads());

  adslota0 =  googletag.defineSlot('/64193083/HERO_MPU_DMPU_ROS', [[300, 600], [300, 1050], [300, 250]], 'div-gpt-ad-1532356085298-0').
       setTargeting("test1","infinitescroll1").
       addService(googletag.pubads());

 adslotb0 =  googletag.defineSlot('/64193083/MPU_DMPU', [[300, 600], [300, 250]], 'div-gpt-ad-1529145788203-0').
       setTargeting("test2","infinitescroll2").
       addService(googletag.pubads());




 // adslot2 =  googletag.defineSlot('/64193083/BILLBOARD_LEADERBOARD', [[970, 250], [728, 90]], 'div-gpt-ad-1529145463897-0').
  //     setTargeting("test","infinitescroll").
  //     addService(googletag.pubads());

  addslothero = googletag.defineSlot('/64193083/BILLBOARD_LEADERBOARD_BF', [[970, 250], [728, 90]], 'div-gpt-ad-1532355911205-0').
      // setTargeting("test","infinitescroll").
       addService(googletag.pubads());

  addslothero1 = googletag.defineSlot('/64193083/HERO_MPU_DMPU_ROS', [[300, 600], [300, 1050], [300, 250]], 'div-gpt-ad-1532356085298-0').
      // setTargeting("test","infinitescroll").
       addService(googletag.pubads());

  addslothero2 = googletag.defineSlot('/64193083/MPU_DMPU', [[300, 600], [300, 250]], 'div-gpt-ad-1529145788203-0').
      // setTargeting("test","infinitescroll").
       addService(googletag.pubads());



   // Infinite scroll requires SRA
   googletag.pubads().enableSingleRequest();

   // Disable initial load, we will use refresh() to fetch ads.
   // Calling this function means that display() calls just
   // register the slot as ready, but do not fetch ads for it.
   googletag.pubads().disableInitialLoad();

   // Enable services
   googletag.enableServices();
 });

 // Function to generate unique names for slots
 var nextSlotId = 1;
 function generateNextSlotName() {
   var id = nextSlotId++;
   return 'adslot' + id;
 }

 // Function to add content to page, mimics real infinite scroll
 // but keeps it much simpler from a code perspective.

  var counter;
  counter = 0;

 function moreContent() {

   // Generate next slot name
   var slotName = generateNextSlotName();

   // Create a div for the slot
   var slotDiv = document.createElement('div');
   slotDiv.id = slotName; // Id must be the same as slotName
 //  document.body.appendChild(slotDiv);
 if( counter == 0 )
{

//console.log ('hey');
   counter = 1;
}
 document.getElementsByClassName("replace-me")[counter].appendChild(slotDiv);
 //console.log (counter);
 counter = counter + 1;
 //console.log (counter);
   // Create and add fake content 1
  // var h1=document.createElement("H2")
  // var text1=document.createTextNode("Dynamic Fake Content 1");
 //  h1.appendChild(text1);
 //  document.body.appendChild(h1);

   // Create and add fake content 2
 //  var h2=document.createElement("H2")
 //  var text2=document.createTextNode("Dynamic Fake Content 2");
 //  h2.appendChild(text2);
 //  document.body.appendChild(h2);

   // Define the slot itself, call display() to
   // register the div and refresh() to fetch ad.
   googletag.cmd.push(function() {
     var slot = googletag.defineSlot('/64193083/BILLBOARD_LEADERBOARD_BF', [[970, 250], [728, 90]], slotName).
        setTargeting("test","infinitescroll").
         addService(googletag.pubads());

     // Display has to be called before
     // refresh and after the slot div is in the page.
     googletag.display(slotName);
     googletag.pubads().refresh([slot]);
   });
 }



// Function to generate unique names for slots
var nextSlot1Id = 1;
 function generateNextSlotName1() {
   var id1 = nextSlot1Id++;
   return 'adslota' + id1;
 }

 // Function to add content to page, mimics real infinite scroll
 // but keeps it much simpler from a code perspective.

  var counter1;
  counter1 = 0;

 function moreContent1() {

   // Generate next slot name
   var slotName1 = generateNextSlotName1();

   // Create a div for the slot
   var slotDiv1 = document.createElement('div');
   slotDiv1.id = slotName1; // Id must be the same as slotName
 //  document.body.appendChild(slotDiv);
 if( counter1 == 0 )
{

//console.log ('hey');
   counter1 = 1;
}
 document.getElementsByClassName("replace-me1")[counter1].appendChild(slotDiv1);
 //console.log (counter);
 counter1 = counter1 + 1;
 //console.log (counter);
   // Create and add fake content 1
  // var h1=document.createElement("H2")
  // var text1=document.createTextNode("Dynamic Fake Content 1");
 //  h1.appendChild(text1);
 //  document.body.appendChild(h1);

   // Create and add fake content 2
 //  var h2=document.createElement("H2")
 //  var text2=document.createTextNode("Dynamic Fake Content 2");
 //  h2.appendChild(text2);
 //  document.body.appendChild(h2);

   // Define the slot itself, call display() to
   // register the div and refresh() to fetch ad.
   googletag.cmd.push(function() {
     var slot1 = googletag.defineSlot('/64193083/HERO_MPU_DMPU_ROS', [[300, 600], [300, 1050], [300, 250]], slotName1).
        setTargeting("test1","infinitescroll1").
         addService(googletag.pubads());

     // Display has to be called before
     // refresh and after the slot div is in the page.
     googletag.display(slotName1);
     googletag.pubads().refresh([slot1]);
   });
 }


// Function to generate unique names for slots
var nextSlot2Id = 1;
 function generateNextSlotName2() {
   var id2 = nextSlot2Id++;
   return 'adslotb' + id2;
 }

 // Function to add content to page, mimics real infinite scroll
 // but keeps it much simpler from a code perspective.

  var counter2;
  counter2 = 0;

 function moreContent2() {

   // Generate next slot name
   var slotName2 = generateNextSlotName2();

   // Create a div for the slot
   var slotDiv2 = document.createElement('div');
   slotDiv2.id = slotName2; // Id must be the same as slotName
 //  document.body.appendChild(slotDiv);
 if( counter2 == 0 )
{

//console.log ('hey');
   counter2 = 1;
}
 document.getElementsByClassName("replace-me2")[counter2].appendChild(slotDiv2);
 //console.log (counter);
 counter2 = counter2 + 1;
 //console.log (counter);
   // Create and add fake content 1
  // var h1=document.createElement("H2")
  // var text1=document.createTextNode("Dynamic Fake Content 1");
 //  h1.appendChild(text1);
 //  document.body.appendChild(h1);

   // Create and add fake content 2
 //  var h2=document.createElement("H2")
 //  var text2=document.createTextNode("Dynamic Fake Content 2");
 //  h2.appendChild(text2);
 //  document.body.appendChild(h2);

   // Define the slot itself, call display() to
   // register the div and refresh() to fetch ad.
   googletag.cmd.push(function() {
     var slot2 = googletag.defineSlot('/64193083/HERO_MPU_DMPU_ROS', [[300, 600], [300, 1050], [300, 250]], slotName2).
        setTargeting("test2","infinitescroll2").
         addService(googletag.pubads());

     // Display has to be called before
     // refresh and after the slot div is in the page.
     googletag.display(slotName2);
     googletag.pubads().refresh([slot2]);
   });
 }


}

</script>
  <script>
  ads1();


// And recheck when window gets resized.
$(window).bind('resize',function(){
    ads1();

});
function ads1() {
  if (w > 1024 ) {
 googletag.cmd.push(function() {
    googletag.defineSlot('/64193083/BILLBOARD_LEADERBOARD', [[970, 250], [728, 90]], 'div-gpt-ad-1529145463897-0').addService(googletag.pubads());
  //  googletag.defineSlot('/64193083/MPU_DMPU', [[300, 600], [300, 250]], 'div-gpt-ad-1529145788203-0').addService(googletag.pubads());
  //  googletag.defineSlot('/64193083/MOB_MPU_LEADER', [[320, 50], [300, 250]], 'div-gpt-ad-1529145936494-0').addService(googletag.pubads());
    googletag.defineSlot('/64193083/HERO_MPU_DMPU', [[300, 1050], [300, 250], [300, 600]], 'div-gpt-ad-1529146495144-0').addService(googletag.pubads());
    googletag.defineSlot('/64193083/HERO_BILLBOARD_LEADERBOARD', [[728, 90], [1320, 250], [970, 250]], 'div-gpt-ad-1529146186757-0').addService(googletag.pubads());
 //  googletag.defineSlot('/64193083/BILLBOARD_LEADERBOARD_BF', [[970, 250], [728, 90]], 'div-gpt-ad-1532355911205-0').addService(googletag.pubads());
//	googletag.defineSlot('/64193083/HERO_MPU_DMPU_ROS', [[300, 600], [300, 1050], [300, 250]], 'div-gpt-ad-1532356085298-0').addService(googletag.pubads());
    googletag.pubads().enableSingleRequest();
    googletag.enableServices();
    });
  }

else if (w <= 1024 ) {
  googletag.cmd.push(function() {
console.log ('tablet')
googletag.defineSlot('/64193083/MOB_MPU_LEADER_2', [[320, 50], [300, 250]], 'div-gpt-ad-1533727476269-0').addService(googletag.pubads());
 //googletag.defineSlot('/64193083/MPU_DMPU', [[300, 600], [300, 250]], 'div-gpt-ad-1529145788203-0').addService(googletag.pubads());
  // googletag.defineSlot('/64193083/MOB_MPU_LEADER', [[320, 50], [300, 250]], 'div-gpt-ad-1529145936494-0').addService(googletag.pubads());
 //   googletag.defineSlot('/64193083/HERO_MPU_DMPU', [[300, 1050], [300, 250], [300, 600]], 'div-gpt-ad-1529146495144-0').addService(googletag.pubads());
 //   googletag.defineSlot('/64193083/HERO_BILLBOARD_LEADERBOARD', [[728, 90], [1320, 250], [970, 250]], 'div-gpt-ad-1529146186757-0').addService(googletag.pubads());
 //  googletag.defineSlot('/64193083/BILLBOARD_LEADERBOARD_BF', [[970, 250], [728, 90]], 'div-gpt-ad-1532355911205-0').addService(googletag.pubads());
//	googletag.defineSlot('/64193083/HERO_MPU_DMPU_ROS', [[300, 600], [300, 1050], [300, 250]], 'div-gpt-ad-1532356085298-0').addService(googletag.pubads());
    googletag.pubads().enableSingleRequest();
    googletag.enableServices();
    });
  }
}

  </script>

</head>
