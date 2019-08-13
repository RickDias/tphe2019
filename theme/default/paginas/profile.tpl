<div class="container" id="user_front_container">
  <div class="fb-profile">
    <!-- capa -->
    <img align="left" class="fb-image-lg" src="{$img_capa}" alt="Profile image example"/>
    <!-- perfil -->
    <img align="left" class="fb-image-profile thumbnail" src="{$img_perfil}" alt="Profile image example"/>

    <div class="fb-profile-text">
      <!-- nome -->
      <h1>{$usuario[0]->nome}</h1>
      <!-- status -->
      <div class="col-md-4">
        <p>{$usuario[0]->email}</p>
        <ul class="list-inline social-buttons">
          <li>
            <a href="{$base_facebook}{$usuario[0]->id_facebook}"><i class="fa fa-facebook"></i></a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>

<br>
<br>
<br>
<br>
<br>
{$usuario|var_dump}
