<div class="level_buttons">
  <ul>
    <li><button class="btn" type="button" onclick="location.href='../exercises.php' ">return</button></li>
    <li><button class="btn" type="button" onclick="location.href='level1.php' ">Level1 (beginner)</button></li>
    <li><button class="btn" type="button" onclick="fetchPage('../data/level1/level1_warmup_data.php')">Warm up</button></li>
    <li><button class="btn" type="button" onclick="fetchPage('../data/level1/level1_wholebodyexercise_data.php')">whole body exercise</button></li>
    <li><button class="btn" type="button" onclick="fetchPage('../data/level1/level1_cooldown_data.php')">Cool down</button></li>
    <li><button class="btn" type="button" onclick="fetchPage('../data/level1/level1_explanations_data.php')">Explanations</button></li>
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