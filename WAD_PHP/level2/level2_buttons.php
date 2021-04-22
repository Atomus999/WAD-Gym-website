<div class="level_buttons">
  <ul>
    <li><button class="btn" type="button" onclick="location.href='../exercises.php' ">return</button></li>
    <li><button class="btn" type="button" onclick="location.href='level2.php' ">Level2 (intermediate)</button></li>
    <li><button class="btn" type="button" onclick="fetchPage('../data/level2/level2_upperbody_data.php')">Upper Body</button></li>
    <li><button class="btn" type="button" onclick="fetchPage('../data/level2/level2_lowerbody_data.php')">Lower Body</button></li>
    <li><button class="btn" type="button" onclick="location.href='../level1/level1_explanations.php' ">Explanations</button></li>
  </ul>

</div>

<script>


function fetchPage(name){
    fetch(name).then(function(response){
      response.text().then(function(text){
        document.querySelector('article').innerHTML = text;
      })
    });
  }


  $(document).ready(function() {
 $(".btn").hover(function(){
  $(this).css({
    "background" : "#ccaf9b"
   })
 },function(){
    $(this).css({
   "background" : "#ECD5BE"
 })
})
});

  </script>