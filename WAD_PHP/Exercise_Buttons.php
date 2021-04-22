<?php if(file_exists("level1/level1.php")){ ?>

<div class="level_buttons">
  <ul>
    <li><button class="btn" type="button" onclick="location.href='level1/level1.php' ">Level 1 (beginner)</button></li>
    <li><button class="btn" type="button" onclick="location.href='level2/level2.php' ">Level 2 (intermediate)</button></li>
    <li><button class="btn" type="button" onclick="location.href='level3/level3.php' ">Level 3 (advanced)</button></li>
    <li><button class="btn" type="button" onclick="location.href='level1/level1_explanations.php' ">Free Exercises</button></li>
  </ul>
</div>

<?php } else if(file_exists("level1.php")) { ?>

  <div class="level_buttons">
  <ul>
    <li><button class="btn" type="button" onclick="location.href='level1.php' ">Level 1 (beginner)</button></li>
    <li><button class="btn" type="button" onclick="location.href='../level2/level2.php' ">Level 2 (intermediate)</button></li>
    <li><button class="btn" type="button" onclick="location.href='../level3/level3.php' ">Level 3 (advanced)</button></li>
    <li><button class="btn" type="button" onclick="location.href='level1_explanations.php' ">Free Exercises</button></li>
  </ul>
</div>

<?php } ?>

<script>   

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