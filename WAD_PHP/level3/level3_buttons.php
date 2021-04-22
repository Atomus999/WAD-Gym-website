<div class="level_buttons">
  <ul>
    <li><button class="btn" type="button" onclick="location.href='../exercises.php' ">return</button></li>
    <li><button class="btn" type="button" onclick="location.href='level3.php' ">Level3 (advanced)</button></li>
    <li><button class="btn" type="button" onclick="fetchPage('../data/level3/level3_chest_data.php')">Chest</button></li>
    <li><button class="btn" type="button" onclick="fetchPage('../data/level3/level3_back_data.php')">Back</button></li>
    <li><button class="btn" type="button" onclick="fetchPage('../data/level3/level3_shoulder_data.php')">Shoulder</button></li>
    <li><button class="btn" type="button" onclick="fetchPage('../data/level3/level3_lowerbody_data.php')">Lower</button></li>
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
</script>

