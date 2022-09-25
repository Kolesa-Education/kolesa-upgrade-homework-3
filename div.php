<?php
$div = <<<HTML
<div class="d-flex justify-content-center">
    <div class="card" style="max-width: 50vw;" xmlns="http://www.w3.org/1999/html">
      <img src="%s" class="card-img-top img-thumbnail" alt="A random photo of a cat" width="%d" height="%d">
      <div class="card-body">
        <h5 class="card-title">A random photo of a cat</h5>
        <p class="card-text">Refresh the page to get a new random cat photo</p>
        <button onClick="refreshPage()" type="button" class="btn btn-primary">Refresh the page!!!</button>
      </div>
    </div>
</div>
HTML;