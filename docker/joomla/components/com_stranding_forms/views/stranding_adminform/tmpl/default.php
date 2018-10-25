<?php
/**
 * @version     1.0.0
 * @package     com_stranding_forms
 * @copyright   Copyright (C) 2014. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Sylvie Fiat <sylvie.fiat@ird.fr>
 */
// no direct access
defined('_JEXEC') or die;

JHtml::_('jquery.framework',  true, true);
JHtml::_('behavior.keepalive');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');

//Load admin language file
$lang = JFactory::getLanguage();
$lang->load('com_stranding_forms', JPATH_ADMINISTRATOR);

$user = JFactory::getUser();
?>

<!-- Styling for making front end forms look OK -->
<!-- This should probably be moved to the template CSS file -->
<style>

#jform_rules-lbl{
  display:none;
}

#access-rules a:hover{
  background:#f5f5f5 url('../images/slider_minus.png') right  top no-repeat;
  color: #444;
}

fieldset.radio label{
  width: 50px !important;
}

.radio {
  display: inline-block;
}

</style>

<script type="text/javascript">

  function getScript(url,success) {
    var script = document.createElement('script');
    script.src = url;
    var head = document.getElementsByTagName('head')[0],
    done = false;
    // Attach handlers for all browsers
    script.onload = script.onreadystatechange = function() {
      if (!done && (!this.readyState
        || this.readyState == 'loaded'
        || this.readyState == 'complete')) {
        done = true;
      success();
      script.onload = script.onreadystatechange = null;
      head.removeChild(script);
    }
  };
  head.appendChild(script);
}

getScript('//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js',function() {
  js = jQuery.noConflict();
  js(document).ready(function() {
    js('#form-stranding_admin').submit(function(event) {
            //The javaScript code
          }); 
  });
});

var cloneId = 0;

$(document).ready(function()
{
  $("#new_identification").click(function()
  {
    var clone = $(".sp_id").clone(true);
    clone.find("input").prop("name", "jform" + cloneId);
    cloneId++;
    clone.appendTo(".row");
  });
});

function add_new_identification_field(div) {
 /* $nbr = document.getElementById("jform_observation_number").value; 
  if($nbr > 1) {
      for($i=0; $i<$nbr; $i++) {
        <?php echo $var ?>
      }
  }*/
}

function add_new_mammal_field(div) {

}

function add_new_measurements_field(div) {

}

function fixedImage(div) {
  var e = document.getElementById(div);
  e.style.position = 'fixed';
}

function toggleContainer(name) {
      var e = document.getElementById(name);// MooTools might not be available ;)
      e.style.display = e.style.display === 'none' ? 'block' : 'none';
    }

    // Fonction 
    function choixUser(btn,champ1,champ2) { 
      if (btn.id == "jform_observation_dead_or_alive0") { 
        display(champ1,true); 
        display(champ2,false);  
      } 
      else if (btn.id == "jform_observation_dead_or_alive1") { 
        display(champ2,true); 
        display(champ1,false); 
      }
      if(btn.id == "jform_observation_tooth_or_baleen_or_defenses0") {
        display(champ1,true); 
        display(champ2,false);
      }
      else if(btn.id == "jform_observation_tooth_or_baleen_or_defenses1") {
        display(champ2,true); 
        display(champ1,false);
      }
      else if(btn.id == "jform_observation_tooth_or_baleen_or_defenses2") {
        display(champ2,false); 
        display(champ1,false);
      }
    }
  //
  function display(div, affiche) { 
    if (affiche) 
      document.getElementById(div).style.display="block"; 
    else 
      document.getElementById(div).style.display="none";  
  }

  /*function duplic(element) {
    clone01 = document.getElementById("spaces_title").cloneNode(true);
    clone01.id="spaces_title_1";
    document.getElementById(element).appendChild (clone01);
    clone1 = document.getElementById("spaces").cloneNode(true);
    clone1.id="spaces1";
    document.getElementById(element).appendChild (clone1);
    clone02 = document.getElementById("spaces_identification_title").cloneNode(true);
    clone02.id = "spaces_identification_title_1";
    document.getElementById(element).appendChild (clone02);
  }*/

  /*Fonction ajout et suppression de champs version 2*/
  function addDiv(name, field) {
    var div = document.createElement("div");
    div.name = name;
    field.appendChild(div);
  }

  function addField(name, field) {
    var div = document.getElementById('identification');
    addDiv(name, field);
  }

  function supr_field(i) { 
    var Parent; 
    var Obj = document.getElementById ( 'input_'+i); 

    if(Obj)      
      Parent = Obj.parentNode;      
    if(Parent) 
      Obj.removeChild(Obj.childNodes[0]); 
  }

  function transpo(i) { 
    document.getElementById('in_'+i).value = document.getElementById('out_'+(i-1)).value; 
  }

</script>

<div class="stranding_admin-edit front-end-edit">
  <?php if (!empty($this->item->id)): ?>
    <h1 class="fa fa-map-marker fa-3x"> <?php echo JText::_('COM_STRANDING_FORMS_EDIT_ITEM_TITLE'); ?> <?php echo $this->item->id; ?></h1>
    <?php else: ?>
      <h1 class="fa fa-map-marker fa-3x"> <?php echo JText::_('COM_STRANDING_FORMS_STRANDING_ADMIN_ADD_ITEM_TITLE'); ?></h1>
      <p class="lead" style="1.3em"> <?php echo JText::_('COM_STRANDING_FORMS_STRANDING_ADMIN_ADD_ITEM_DESC'); ?></p>
    <?php endif; ?>

    <form id="form-stranding_admin" action="<?php echo JRoute::_('index.php?option=com_stranding_forms&task=stranding_admin.save'); ?>" method="post" class="form-validate" enctype="multipart/form-data">
      <!--Contacts-->
      <div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12"><span class="stranding_admin-title_row"><span class="fa fa-user fa-2x"><h4><?php echo JText::_('COM_STRANDING_FORMS_EDIT_ITEM_ROW1'); ?></h4></span></span></div>
      </div>
      <!--Observer contacts-->
      <div class="row">
       <div class="col-lg-12 col-md-12 col-xs-12"><?php echo $this->form->getLabel('observer_name'); ?></div>
       <div class="col-lg-3 col-md-6 col-xs-12">
        <div class="input-group">
          <span class="input-group-addon exergue"><span class="fa fa-user"></span></span>
          <?php echo $this->form->getInput('observer_name'); ?>
          <span style="display:none;" ><?php echo $this->form->getInput('id'); ?></span>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-xs-12">
        <div class="input-group">
          <span class="input-group-addon exergue"><span class="fa fa-home"></span></span>
          <?php echo $this->form->getInput('observer_address'); ?>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-xs-12">
        <div class="input-group">
          <span class="input-group-addon exergue"><span class="fa fa-phone"></span></span>
          <?php echo $this->form->getInput('observer_tel'); ?>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-xs-12">
        <div class="input-group">
          <span class="input-group-addon exergue"><span class="fa fa-envelope"></span></span>
          <?php echo $this->form->getInput('observer_email'); ?>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12 col-md-12 col-xs-12">
        <label><?php echo JText::_('COM_STRANDING_FORMS_EDIT_ITEM_INFORMANT_CONTACT');?></label>
        <button type="button" name="informantBtn" class="btn btn-primary" value="informateur" onclick="toggleContainer('informant_field')"><label><?php echo JText::_('RIGHT_HERE'); ?></label></button>
      </div>
    </div>
    <!--Informant contacts-->
    <div class="row" id="informant_field" style="display: none;">
      <div class="col-lg-12 col-md-12 col-xs-12"><?php echo $this->form->getLabel('informant_name'); ?></div>
      <div class="col-lg-3 col-md-6 col-xs-12">
        <div class="input-group">
          <span class="input-group-addon exergue"><span class="fa fa-user"></span></span>
          <?php echo $this->form->getInput('informant_name'); ?>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-xs-12">
        <div class="input-group">
          <span class="input-group-addon exergue"><span class="fa fa-home"></span></span>
          <?php echo $this->form->getInput('informant_address'); ?>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-xs-12">
        <div class="input-group">
          <span class="input-group-addon exergue"><span class="fa fa-phone"></span></span>
          <?php echo $this->form->getInput('informant_tel'); ?>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-xs-12">
        <div class="input-group">
          <span class="input-group-addon exergue"><span class="fa fa-envelope"></span></span>
          <?php echo $this->form->getInput('informant_email'); ?>
        </div>
      </div>
    </div>
    <!--Circonstance de l'échouage-->
    <div class="row">
      <div class="col-lg-12 col-md-12 col-xs-12"><span class="stranding_admin-title_row"><span class="fa fa-flag fa-2x"><h4><?php echo JText::_('COM_STRANDING_FORMS_EDIT_ITEM_ROW2'); ?></h4></span></span></div>
    </div>
    <!--Date-->
    <div class="row">
      <div class="col-lg-12 col-md-12 col-xs-12"><?php echo $this->form->getLabel('observation_datetime'); ?></div>
      <div class="col-lg-4 col-md-6 col-xs-12">
        <div class="input-group included">
          <span class="input-group-addon exergue com_stranding_forms_date"><span class="fa fa-calendar"></span></span>
          <?php echo $this->form->getInput('observation_datetime'); ?>
        </div>
      </div>
      <div class="col-lg-8 col-md-6 col-xs-12">
        <div class="input-group">
          <span class="input-group-addon"><span class="fa fa-location-arrow"></span></span>
          <?php echo $this->form->getInput('observation_location'); ?>
        </div>
      </div>
    </div>
    <div class="row">
     <div class="col-lg-12 col-md-12 col-xs-12"><?php echo $this->form->getLabel('observation_localisation'); ?></div>
     <div class="col-md-12 col-md-12 col-xs-12">
      <div class="input-group included com_stranding_forms_localisation">
        <span class="input-group-addon exergue"><span class="fa fa-map-marker"></span></span>
        <?php echo $this->form->getInput('observation_localisation'); ?>
      </div>
    </div>
  </div>
  <div class="row">
   <div class="col-md-6 col-md-6 col-xs-12">
    <div class="input-group">
      <span class="input-group-addon"></span>
      <?php echo $this->form->getInput('observation_region'); ?>
    </div>
  </div>
  <div class="col-md-6 col-md-6 col-xs-12">
    <div class="input-group">
      <span class="input-group-addon"></span>
      <?php echo $this->form->getInput('observation_latitude'); ?>
    </div>
  </div>
</div>
<div class="row">
 <div class="col-md-6 col-md-6 col-xs-12">
  <div class="input-group">
    <span class="input-group-addon"></span>
    <?php echo $this->form->getInput('observation_country'); ?>
  </div>
</div>
<div class="col-md-6 col-md-6 col-xs-12">
  <div class="input-group">
    <span class="input-group-addon"></span>
    <?php echo $this->form->getInput('observation_longitude'); ?>
  </div>
</div>
</div>
<div class="row">
  <!--Stranding type-->
  <div class="col-lg-6 col-md-6 col-xs-12">
    <div class="form-group">
      <?php echo $this->form->getLabel('observation_stranding_type'); ?>
      <div class="col-xs-offset-2 col-xs-10">
        <div class="radio">
          <label><?php echo $this->form->getInput('observation_stranding_type'); ?></label>
        </div>
      </div>
    </div>
  </div>
  <!--Number-->
  <div class="col-lg-6 col-md-6 col-xs-12">
    <?php echo $this->form->getLabel('observation_number'); ?>
    <div class="input-group">
      <span class="input-group-addon"><span class="fa fa-tachometer"></span></span>
      <?php echo $this->form->getInput('observation_number'); ?>
      <span style="display:none;" ><?php echo $this->form->getInput('id_location'); ?></span>
    </div>
  </div>
</div>
<!--Identification-->
<div class="row">
  <div class="col-lg-12 col-md-12 col-xs-12" id="title_R3"><span class="stranding_admin-title_row"><span class="fa fa-eye fa-2x"><h4><?php echo JText::_('COM_STRANDING_FORMS_EDIT_ITEM_ROW3'); ?></h4></span></span></div>
</div>
<div class="row" id="identification">
  <!--Spaces-->
  <div class="col-lg-6 col-md-6 col-xs-12" id="spaces" name="espece[]">
    <?php echo $this->form->getLabel('observation_spaces'); ?>
    <div class="input-group">
      <span class="input-group-addon"><span class="fa fa-eye"></span></span>
      <?php echo $this->form->getInput('observation_spaces'); ?>
    </div>
  </div><p><br></p>
  <!--Spaces identification-->
  <div class="col-lg-6 col-md-6 col-xs-12 sp_id" id="spaces_identification" name="id_espece[]">
    <div class="form-group">
      <?php echo $this->form->getLabel('observation_spaces_identification'); ?>
      <div class="col-xs-offset-6 col-xs-12">
        <div class="radio-list">
          <label><?php echo $this->form->getInput('observation_spaces_identification'); ?></label>
        </div>
      </div>
    </div>
  </div>
  <!--Color-->
  <div class="col-lg-6 col-md-6 col-xs-12" id="color" name="couleur[]">
    <?php echo $this->form->getLabel('observation_color'); ?>
    <div class="input-group">
      <span class="input-group-addon"><span class="fa fa-adjust"></span><stpan></span>
        <?php echo $this->form->getInput('observation_color'); ?>
      </div>
    </div><p><br></p>
    <!--Tail fin-->
    <div class="col-lg-6 col-md-6 col-xs-12" id="tail_fin" name="tail[]">
      <div class="form-group">
        <?php echo $this->form->getLabel('observation_caudal'); ?>
        <button type="button" name="Tail_Fin_Btn" class="btn btn-primary" value="Tail-Fin"onclick="toggleContainer('tail_fin_image')"><label><?php echo JText::_('COM_STRANDING_FORMS_EDIT_ITEM_SEE_TF_IMAGE'); ?></label></button>
        <div class="col-xs-offset-2 col-xs-10">
          <div class="radio">
            <label><?php echo $this->form->getInput('observation_caudal'); ?></label>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-8 col-lg-8 col-xs-12" id="tail_fin_image" style="display: none;">
     <p>
      <img src="administrator/components/com_stranding_forms/assets/images/cetace_tail.png" title="<?php echo JText::_('COM_STRANDING_FORMS_EDIT_ITEM_TAIL_FIN')?>" />
    </p>
  </div>

  <!--Beak or furrows-->
  <div class="col-lg-8 col-md-8 col-xs-12" id="tail_fin" name="tail[]">
    <div class="form-group">
      <?php echo $this->form->getLabel('observation_beak_or_furrows'); ?>
      <div class="col-xs-offset-2 col-xs-10">
        <div class="radio">
          <label><?php echo $this->form->getInput('observation_beak_or_furrows'); ?></label>
        </div>
      </div>
    </div>
  </div>

  <!--Other caracteristques-->
  <div class="col-lg-12 col-md-12 col-xs-12" id="other_caracts" name="other_crctrstk[]">
    <div class="form-group">
      <?php echo $this->form->getLabel('observation_tooth_or_baleen_or_defenses'); ?>
      <div class="col-xs-offset-2 col-xs-10">
        <div class="radio">
          <label><?php echo $this->form->getInput('observation_tooth_or_baleen_or_defenses'); ?></label>
        </div>
      </div>
    </div>
  </div>
  <!--Tooth-->
  <div class="tooth_f" id="tooth_field" style="display: none;" name="dents[]">
    <div class="col-lg-12 col-md-12 col-xs-12">
      <label id="" class="hasTooltip" title="<?php echo JText::_('OBSERVATION_TOOTH_NUMBER_DESC');?>">
        <?php echo JText::_('OBSERVATION_TOOTH_NUMBER_LBL');?>
      </label>
    </div>
    <div class="col-lg-12 col-md-12 col-xs-12">
      <div class="form-group">
        <?php echo $this->form->getLabel('nb_teeth_upper_right'); ?>
        <div class="col-xs-offset-6 col-xs-12">
          <div class="input-group">
            <span class="input-group-addon"><span class="fa fa-tachometer"></span></span>
            <?php echo $this->form->getInput('nb_teeth_upper_right'); ?>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-12 col-md-12 col-xs-12">
      <div class="form-group">
        <?php echo $this->form->getLabel('nb_teeth_upper_left'); ?>
        <div class="col-xs-offset-6 col-xs-12">
          <div class="input-group">
            <span class="input-group-addon"><span class="fa fa-tachometer"></span></span>
            <?php echo $this->form->getInput('nb_teeth_upper_left'); ?>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-12 col-md-12 col-xs-12">
      <div class="form-group">
        <?php echo $this->form->getLabel('nb_teeth_lower_right'); ?>
        <div class="col-xs-offset-6 col-xs-12">
          <div class="input-group">
            <span class="input-group-addon"><span class="fa fa-tachometer"></span></span>
            <?php echo $this->form->getInput('nb_teeth_lower_right'); ?>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-12 col-md-12 col-xs-12">
      <div class="form-group">
        <?php echo $this->form->getLabel('nb_teeth_lower_left'); ?>
        <div class="col-xs-offset-6 col-xs-12">
          <div class="input-group">
            <span class="input-group-addon"><span class="fa fa-tachometer"></span></span>
            <?php echo $this->form->getInput('nb_teeth_lower_left'); ?>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-12 col-md-12 col-xs-12">
      <div class="form-group">
        <?php echo $this->form->getLabel('observation_teeth_base_diametre'); ?>
        <div class="col-xs-offset-6 col-xs-12">
          <div class="input-group">
            <span class="input-group-addon"><span class="fa fa-arrows-h"></span></span>
            <?php echo $this->form->getInput('observation_teeth_base_diametre'); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--Baleen-->
  <div class="baleen_f" id="baleen_field" style="display: none;" name="fanons[]">
    <div class="col-lg-12 col-md-12 col-xs-12">
      <label id="" class="hasTooltip" title="<?php echo JText::_('OBSERVATION_BALEEN_DESC');?>">
        <?php echo JText::_('OBSERVATION_BALEEN_LBL');?>
      </label>
    </div>
    <div class="col-lg-12 col-md-12 col-xs-12">
      <div class="form-group">
        <?php echo $this->form->getLabel('observation_baleen_color'); ?>
        <div class="col-xs-offset-6 col-xs-12">
          <div class="input-group">
           <span class="input-group-addon"><span class="fa fa-adjust"></span></span>
           <?php echo $this->form->getInput('observation_baleen_color'); ?>
         </div>
       </div>
     </div>
   </div>
   <div class="col-lg-12 col-md-12 col-xs-12">
    <label id="" class="hasTooltip" title="<?php echo JText::_('OBSERVATION_BALEEN_MEASURES_DESC');?>">
      <?php echo JText::_('OBSERVATION_BALEEN_MEASURES_LBL');?>
    </label>
  </div>
  <div class="col-lg-12 col-md-12 col-xs-12">
    <div class="form-group">
      <?php echo $this->form->getLabel('observation_baleen_height'); ?>
      <div class="col-xs-offset-6 col-xs-12">
        <div class="input-group">
          <span class="input-group-addon"><span class="fa fa-arrows-v"></span></span>
          <?php echo $this->form->getInput('observation_baleen_height'); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-12 col-md-12 col-xs-12">
    <div class="form-group">
      <?php echo $this->form->getLabel('observation_baleen_base_height'); ?>
      <div class="col-xs-offset-6 col-xs-12">
        <div class="input-group">
          <span class="input-group-addon"><span class="fa fa-arrows-h"></span></span>
          <?php echo $this->form->getInput('observation_baleen_base_height'); ?>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<div class="row">
  <!--onclick="duplic('identification')"-->
  <div class="col-lg-12 col-md-12 col-xs-12">
    <button type="button" id="new_identification" class="btn btn-primary" ><label><?php echo JText::_('COM_STRANDING_FORMS_EDIT_ITEM_ADD_FIELDS'); ?></label></button>
  </div>
</div>
<!--Animal-->
<div class="row">
  <div class="col-lg-12 col-md-12 col-xs-12" id="title_R4"><span class="stranding_admin-title_row"><span class="fa fa-shield fa-2x"><h4><?php echo JText::_('COM_STRANDING_FORMS_EDIT_ITEM_ROW4'); ?></h4></span></span></div>
</div>
<div class="row" id="animal">
  <!--Levies & photos-->
  <div class="col-lg-6 col-md-6 col-xs-12">
    <div class="form-group">
      <?php echo $this->form->getLabel('levies'); ?>
      <div class="col-xs-offset-2 col-xs-10">
        <div class="radio">
          <label><?php echo $this->form->getInput('levies'); ?></label>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-6 col-md-6 col-xs-12">
    <div class="form-group">
      <?php echo $this->form->getLabel('photos'); ?>
      <div class="col-xs-offset-2 col-xs-10">
        <div class="radio">
          <label><?php echo $this->form->getInput('photos'); ?></label>
        </div>
      </div>
    </div>
  </div>
  <!--Size-->
  <div class="col-lg-6 col-md-6 col-xs-12">
    <?php echo $this->form->getLabel('observation_size'); ?>
    <div class="input-group">
      <span class="input-group-addon"><span class="fa fa-arrows-h"></span></span>
      <?php echo $this->form->getInput('observation_size'); ?>
    </div>
  </div>
  <!--Size précision-->
  <div class="col-lg-6 col-md-6 col-xs-12">
    <div class="form-group">
      <?php echo $this->form->getLabel('observation_size_precision'); ?>
      <div class="col-xs-offset-2 col-xs-10">
        <div class="radio">
          <label><?php echo $this->form->getInput('observation_size_precision'); ?></label>
        </div>
      </div>
    </div>
  </div>
  <!--Sex-->
  <div class="col-lg-6 col-md-6 col-xs-12">
    <div class="form-group">
      <?php echo $this->form->getLabel('observation_sex'); ?>
      <div class="col-xs-offset-2 col-xs-10">
        <div class="radio">
          <label><?php echo $this->form->getInput('observation_sex'); ?></label>
        </div>
      </div>
    </div>
  </div>
  <!--Abnormalities-->
  <div class="col-lg-6 col-md-6 col-xs-12">
    <div class="form-group">
      <?php echo $this->form->getLabel('observation_abnormalities'); ?>
      <div class="col-xs-offset-2 col-xs-10">
        <div class="radio">
          <label><?php echo $this->form->getInput('observation_abnormalities'); ?></label>
        </div>
      </div>
    </div>
  </div>
  <!--Capture traces-->
  <div class="col-lg-6 col-md-6 col-xs-12">
    <div class="form-group">
      <?php echo $this->form->getLabel('observation_capture_traces'); ?>
      <div class="col-xs-offset-2 col-xs-10">
        <div class="radio">
          <label><?php echo $this->form->getInput('observation_capture_traces'); ?></label>
        </div>
      </div>
    </div>
  </div>
  <!--Catch indices-->
  <div class="col-lg-6 col-md-6 col-xs-12">
    <?php echo $this->form->getLabel('catch_indices'); ?>
    <div class="input-group"> 
      <span class="input-group-addon"><span class="fa fa-comment "></span></span>
      <?php echo $this->form->getInput('catch_indices'); ?>
    </div>
  </div>
  <!--State-->
  <div class="col-lg-6 col-md-6 col-xs-12">
    <div class="form-group">
      <?php echo $this->form->getLabel('observation_dead_or_alive'); ?>
      <div class="col-xs-offset-2 col-xs-10">
        <div class="radio">
          <label><?php echo $this->form->getInput('observation_dead_or_alive'); ?></label>
        </div>
      </div>
    </div>
  </div>
  <!--Dead animal-->
  <div id="dead_field" style="display: none;">
    <div class="col-lg-12 col-md-12 col-xs-12">
      <label id="jform_dead_animal_label" class="hasTooltip" title="<?php echo JText::_('COM_STRANDING_FORMS_EDIT_ITEM_OBSERVATION_DEAD_ANIMAL_DESC');?>">
        <?php echo JText::_('COM_STRANDING_FORMS_EDIT_ITEM_OBSERVATION_DEAD_ANIMAL');?>
      </label>
    </div>
    <div class="col-lg-12 col-md-12 col-xs-12">
      <div class="form-group">
        <div class="col-xs-offset-6 col-xs-12">
          <div class="radio">
            <label><?php echo $this->form->getInput('observation_death'); ?></label>
          </div>
        </div>
      </div>
    </div>
    <!--Death date-->
    <div class="form-inline">
      <div class="col-lg-6 col-md-6 col-xs-12">
        <?php echo $this->form->getLabel('observation_datetime_death'); ?>
        <div class="input-group included">
          <span class="input-group-addon exergue"><span class="fa fa-calendar"></span></span>
          <?php echo $this->form->getInput('observation_datetime_death'); ?>
        </div>
      </div>
      <div class="col-lg-3 col-md-3 col-xs-3">
        <?php echo $this->form->getLabel('observation_hours'); ?>
        <div class="input-group">
          <span class="input-group-addon"><span class="fa fa-clock-o"></span>
        </span>
        <?php echo $this->form->getInput('observation_hours'); ?>&nbsp;
        <label><?php echo JText::_('COM_STRANDING_FORMS_EDIT_ITEM_HM_SEPARATOR'); ?></label>&nbsp;
        <?php echo $this->form->getInput('observation_minutes'); ?>
      </div>
    </div>
  </div>
  &nbsp;&nbsp;&nbsp;
  <!--State decomposition-->
  <div class="col-lg-12 col-md-12 col-xs-12"><?php echo $this->form->getLabel('observation_state_decomposition'); ?></div>
  <div class="col-lg-8 col-md-8 col-xs-12">
   <div class="form-group">
    <div class="col-xs-offset-2 col-xs-10">
      <div class="radio">
        <label><?php echo $this->form->getInput('observation_state_decomposition'); ?></label>
      </div>
    </div>
  </div> 
</div>
<!--Levies protocol-->
<div class="col-lg-12 col-md-12 col-xs-12"><?php echo $this->form->getLabel('levies_protocole'); ?></div>
<div class="col-lg-6 col-md-6 col-xs-12">
  <div class="form-group">
    <div class="col-xs-offset-2 col-xs-10">
      <div class="radio">
        <label><?php echo $this->form->getInput('levies_protocole'); ?></label>
      </div>
    </div>
  </div>
</div>
<!--Label references-->
<div class="col-lg-6 col-md-6 col-xs-12" id="label_ref">
  <?php echo $this->form->getLabel('label_references'); ?>
  <div class="input-group">
    <span class="input-group-addon"><span class="fa fa-tag"></span></span>
    <?php echo $this->form->getInput('label_references'); ?>
  </div>
</div>&nbsp;&nbsp;&nbsp;
<!--Tissue removal dead-->
<div class="col-lg-6 col-md-6 col-xs-12">
  <div class="form-group">
    <?php echo $this->form->getLabel('observation_tissue_removal_dead'); ?>
    <div class="col-xs-offset-2 col-xs-10">
      <div class="checkbox">
        <label><?php echo $this->form->getInput('observation_tissue_removal_dead'); ?></label>
      </div>
    </div>
  </div>
</div>
</div>
<!--Living animal-->
<div id="alive_field" style="display: none;">
  <div class="col-lg-12 col-md-12 col-xs-12">
    <label id="jform_dead_animal_label" class="hasTooltip" title="<?php echo JText::_('COM_STRANDING_FORMS_EDIT_ITEM_OBSERVATION_LIVING_ANIMAL_DESC');?>">
      <?php echo JText::_('COM_STRANDING_FORMS_EDIT_ITEM_OBSERVATION_LIVING_ANIMAL');?>
    </label>
  </div>
  <div class="col-lg-12 col-md-12 col-xs-12">
    <div class="form-group">
      <div class="col-xs-offset-2 col-xs-10">
        <div class="checkbox">
          <label><?php echo $this->form->getInput('observation_alive'); ?></label>
        </div>
      </div>
    </div>
  </div>
  <!--Release date-->
  <div class="form-inline">
    <div class="col-lg-8 col-md-8 col-xs-12">
      <?php echo $this->form->getLabel('observation_datetime_release'); ?>
      <div class="input-group included">
        <span class="input-group-addon exergue"><span class="fa fa-calendar"></span></span>
        <?php echo $this->form->getInput('observation_datetime_release'); ?>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-xs-4">
      <?php echo $this->form->getLabel('observation_hours'); ?>
      <div class="input-group">
        <span class="input-group-addon"><span class="fa fa-clock-o"></span>
      </span>
      <?php echo $this->form->getInput('observation_hours'); ?>&nbsp;
      <label><?php echo JText::_('COM_STRANDING_FORMS_EDIT_ITEM_HM_SEPARATOR'); ?></label>&nbsp;
      <?php echo $this->form->getInput('observation_minutes'); ?>
    </div>
  </div>
</div>
&nbsp;&nbsp;&nbsp;
<!--Tissue removal alive-->
<div class="col-lg-6 col-md-6 col-xs-12">
  <div class="form-group">
    <?php echo $this->form->getLabel('observation_tissue_removal_alive'); ?>
    <div class="col-xs-offset-6 col-xs-12">
      <div class="checkbox">
        <label><?php echo $this->form->getInput('observation_tissue_removal_alive'); ?></label>
      </div>
    </div>
  </div>
</div>
</div>
</div>
<!--Measurements-->
<div class="row">
  <div class="col-lg-12 col-md-12 col-xs-12" id="title_R5"><span class="stranding_admin-title_row"><span class="fa fa-arrows-h fa-2x"><h4><?php echo JText::_('COM_STRANDING_FORMS_EDIT_ITEM_ROW5'); ?></h4></span></span></div>
</div>
<div id="measurements">
  <div class="row" id="com_stranding_forms_measurements_info">
    <div class="col-lg-12 col-md-12 col-xs-12" id="mesures_info">
      <span class="fa fa-info-circle"><label class="info-mesurements"><?php echo JText::_('COM_STRANDING_FORMS_EDIT_ITEM_MESURES_INFO_1');?>
      <strong style="color: red;"><?php echo JText::_('COM_STRANDING_FORMS_EDIT_ITEM_MESURES_INFO_RED');?></strong>
      <?php echo JText::_('COM_STRANDING_FORMS_EDIT_ITEM_MESURES_INFO_2');?>
    </label></span>
  </div>
</div>
<!--Cetaces measurements-->
<div id="cetace_measures">
  <div class="row">
    <div class="col-lg-9 col-md-10 col-xs-12" id="cetace_measures_position">
      <label class="hasTooltip measures" title="<?php echo JText::_('COM_STRANDING_FORMS_EDIT_ITEM_MESURES_IMAGE_DESC'); ?>"><?php echo JText::_('COM_STRANDING_FORMS_EDIT_ITEM_DOLPHIN_MESURES_IMAGE'); ?></label>
      <p>
       <img id="dolphin_image" src="administrator/components/com_stranding_forms/assets/images/l_dolphin.png" alt="Mesures sur cétacés" title="<?php echo JText::_('COM_STRANDING_FORMS_EDIT_ITEM_MESURES_CETACE_IMAGE_DESC'); ?>" />
     </p>
   </div>
 </div>
 <div class="row">
   <div class=" col-lg-12 col-md-12 col-xs-12">
    <label title="<?php echo JText::_('COM_STRANDING_FORMS_EDIT_ITEM_MESURES_BODY_DESC'); ?>"><?php echo JText::_('COM_STRANDING_FORMS_EDIT_ITEM_MESURES_BODY'); ?></label>
  </div>
  <div class="col-lg-3 col-md-6 col-xs-12">
    <div class="form-group">
      <div class="col-xs-offset-6 col-xs-12">
        <div class="input-group">
          <span class="input-group-addon important_mesures"><?php echo $this->form->getLabel('observation_dolphin_mesures_a'); ?><span></span></span>
          <?php echo $this->form->getInput('observation_dolphin_mesures_a'); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-xs-12">
    <div class="form-group">
      <div class="col-xs-offset-6 col-xs-12">
        <div class="input-group">
          <span class="input-group-addon important_mesures"><?php echo $this->form->getLabel('observation_dolphin_mesures_b'); ?><span></span></span>
          <?php echo $this->form->getInput('observation_dolphin_mesures_b'); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-xs-12">
    <div class="form-group">
      <div class="col-xs-offset-6 col-xs-12">
        <div class="input-group">
          <span class="input-group-addon"><?php echo $this->form->getLabel('observation_dolphin_mesures_c'); ?><span></span></span>
          <?php echo $this->form->getInput('observation_dolphin_mesures_c'); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-xs-12">
    <div class="form-group">
      <div class="col-xs-offset-6 col-xs-12">
        <div class="input-group">
          <span class="input-group-addon"><?php echo $this->form->getLabel('observation_dolphin_mesures_d'); ?><span></span></span>
          <?php echo $this->form->getInput('observation_dolphin_mesures_d'); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-xs-12">
    <div class="form-group">
      <div class="col-xs-offset-6 col-xs-12">
        <div class="input-group">
          <span class="input-group-addon important_mesures"><?php echo $this->form->getLabel('observation_dolphin_mesures_e'); ?><span></span></span>
          <?php echo $this->form->getInput('observation_dolphin_mesures_e'); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-xs-12">
    <div class="form-group">
      <div class="col-xs-offset-6 col-xs-12">
        <div class="input-group">
          <span class="input-group-addon"><?php echo $this->form->getLabel('observation_dolphin_mesures_f'); ?><span></span></span>
          <?php echo $this->form->getInput('observation_dolphin_mesures_f'); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-xs-12">
    <div class="form-group">
      <div class="col-xs-offset-6 col-xs-12">
        <div class="input-group">
          <span class="input-group-addon"><?php echo $this->form->getLabel('observation_dolphin_mesures_g'); ?><span></span></span>
          <?php echo $this->form->getInput('observation_dolphin_mesures_g'); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-xs-12">
    <div class="form-group">
      <div class="col-xs-offset-6 col-xs-12">
        <div class="input-group">
          <span class="input-group-addon"><?php echo $this->form->getLabel('observation_dolphin_mesures_h'); ?><span></span></span>
          <?php echo $this->form->getInput('observation_dolphin_mesures_h'); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-xs-12">
    <div class="form-group">
      <div class="col-xs-offset-6 col-xs-12">
        <div class="input-group">
          <span class="input-group-addon"><?php echo $this->form->getLabel('observation_dolphin_mesures_i'); ?><span></span></span>
          <?php echo $this->form->getInput('observation_dolphin_mesures_i'); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-xs-12">
    <div class="form-group">
      <div class="col-xs-offset-6 col-xs-12">
        <div class="input-group">
          <span class="input-group-addon important_mesures"><?php echo $this->form->getLabel('observation_dolphin_mesures_j'); ?><span></span></span>
          <?php echo $this->form->getInput('observation_dolphin_mesures_j'); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-xs-12">
    <div class="form-group">
      <div class="col-xs-offset-6 col-xs-12">
        <div class="input-group">
          <span class="input-group-addon"><?php echo $this->form->getLabel('observation_dolphin_mesures_k'); ?><span></span></span>
          <?php echo $this->form->getInput('observation_dolphin_mesures_k'); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-xs-12">
    <div class="form-group">
      <div class="col-xs-offset-6 col-xs-12">
        <div class="input-group">
          <span class="input-group-addon important_mesures"><?php echo $this->form->getLabel('observation_dolphin_mesures_l'); ?><span></span></span>
          <?php echo $this->form->getInput('observation_dolphin_mesures_l'); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-xs-12">
    <div class="form-group">
      <div class="col-xs-offset-6 col-xs-12">
        <div class="input-group">
          <span class="input-group-addon important_mesures"><?php echo $this->form->getLabel('observation_dolphin_mesures_m'); ?><span></span></span>
          <?php echo $this->form->getInput('observation_dolphin_mesures_m'); ?>
        </div>
      </div>
    </div>
  </div>
  <div class=" col-lg-12 col-md-12 col-xs-12">
    <label title="<?php echo JText::_('COM_STRANDING_FORMS_EDIT_ITEM_MESURES_PECTORAL_FIN_DESC'); ?>"><?php echo JText::_('COM_STRANDING_FORMS_EDIT_ITEM_MESURES_PECTORAL_FIN'); ?></label>
  </div>
  <div class="col-lg-3 col-md-6 col-xs-12">
    <div class="form-group">
      <div class="col-xs-offset-6 col-xs-12">
        <div class="input-group">
          <span class="input-group-addon important_mesures"><?php echo $this->form->getLabel('observation_dolphin_mesures_n'); ?><span></span></span>
          <?php echo $this->form->getInput('observation_dolphin_mesures_n'); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-xs-12">
    <div class="form-group">
      <div class="col-xs-offset-6 col-xs-12">
        <div class="input-group">
          <span class="input-group-addon"><?php echo $this->form->getLabel('observation_dolphin_mesures_o'); ?><span></span></span>
          <?php echo $this->form->getInput('observation_dolphin_mesures_o'); ?>
        </div>
      </div>
    </div>
  </div>
  <div class=" col-lg-12 col-md-12 col-xs-12">
    <label title="<?php echo JText::_('COM_STRANDING_FORMS_EDIT_ITEM_DOLPHIN_MESURES_BACK_FLAP_DESC'); ?>"><?php echo JText::_('COM_STRANDING_FORMS_EDIT_ITEM_DOLPHIN_MESURES_BACK_FLAP'); ?></label>
  </div>
  <div class="col-lg-3 col-md-6 col-xs-12">
    <div class="form-group">
      <div class="col-xs-offset-6 col-xs-12">
        <div class="input-group">
          <span class="input-group-addon important_mesures"><?php echo $this->form->getLabel('observation_dolphin_mesures_p'); ?><span></span></span>
          <?php echo $this->form->getInput('observation_dolphin_mesures_p'); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-xs-12">
    <div class="form-group">
      <div class="col-xs-offset-6 col-xs-12">
        <div class="input-group">
          <span class="input-group-addon important_mesures"><?php echo $this->form->getLabel('observation_dolphin_mesures_q'); ?><span></span></span>
          <?php echo $this->form->getInput('observation_dolphin_mesures_q'); ?>
        </div>
      </div>
    </div>
  </div>
  <div class=" col-lg-12 col-md-12 col-xs-12">
    <label title="<?php echo JText::_('COM_STRANDING_FORMS_EDIT_ITEM_MESURES_TAIL_FIN_DESC'); ?>"><?php echo JText::_('COM_STRANDING_FORMS_EDIT_ITEM_MESURES_TAIL_FIN'); ?></label>
  </div>
  <div class="col-lg-3 col-md-6 col-xs-12">
    <div class="form-group">
      <div class="col-xs-offset-6 col-xs-12">
        <div class="input-group">
          <span class="input-group-addon"><?php echo $this->form->getLabel('observation_dolphin_mesures_r'); ?><span></span></span>
          <?php echo $this->form->getInput('observation_dolphin_mesures_r'); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-xs-12">
    <div class="form-group">
      <div class="col-xs-offset-6 col-xs-12">
        <div class="input-group">
          <span class="input-group-addon important_mesures"><?php echo $this->form->getLabel('observation_dolphin_mesures_s'); ?><span></span></span>
          <?php echo $this->form->getInput('observation_dolphin_mesures_s'); ?>
        </div>
      </div>
    </div>
  </div>
  <div class=" col-lg-12 col-md-12 col-xs-12">
    <label title="<?php echo JText::_('COM_STRANDING_FORMS_EDIT_ITEM_MESURES_BACON_THICKNESS_DESC'); ?>"><?php echo JText::_('COM_STRANDING_FORMS_EDIT_ITEM_MESURES_BACON_THICKNESS'); ?></label>
  </div>
  <div class="col-lg-3 col-md-6 col-xs-12">
    <div class="form-group">
      <div class="col-xs-offset-6 col-xs-12">
        <div class="input-group">
          <span class="input-group-addon"><?php echo $this->form->getLabel('observation_dolphin_mesures_t'); ?><span></span></span>
          <?php echo $this->form->getInput('observation_dolphin_mesures_t'); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-xs-12">
    <div class="form-group">
      <div class="col-xs-offset-6 col-xs-12">
        <div class="input-group">
          <span class="input-group-addon"><?php echo $this->form->getLabel('observation_dolphin_mesures_u'); ?><span></span></span>
          <?php echo $this->form->getInput('observation_dolphin_mesures_u'); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-xs-12">
    <div class="form-group">
      <div class="col-xs-offset-6 col-xs-12">
        <div class="input-group">
          <span class="input-group-addon"><?php echo $this->form->getLabel('observation_dolphin_mesures_v'); ?><span></span></span>
          <?php echo $this->form->getInput('observation_dolphin_mesures_v'); ?>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<!--Dugongs measurements-->
<div id="dugong_measures">
  <div class="row">
    <div class="col-lg-9 col-md-10 col-xs-12" id="dugong_measures_position">
      <label class="hasTooltip measures" title="<?php echo JText::_('COM_STRANDING_FORMS_EDIT_ITEM_MESURES_IMAGE_DESC'); ?>"><?php echo JText::_('COM_STRANDING_FORMS_EDIT_ITEM_DUGONG_MESURES_IMAGE'); ?></label>
      <p>
        <img id="dugong_image" src="administrator/components/com_stranding_forms/assets/images/l_dugong.png" alt="Mesures sur dugongs" title="<?php echo JText::_('COM_STRANDING_FORMS_EDIT_ITEM_MESURES_DUGONG_IMAGE_DESC'); ?>" />
      </p>
    </div>
  </div>
  <div class="row">
   <div class=" col-lg-12 col-md-12 col-xs-12">
    <label title="<?php echo JText::_('COM_STRANDING_FORMS_EDIT_ITEM_MESURES_BODY_DESC'); ?>"><?php echo JText::_('COM_STRANDING_FORMS_EDIT_ITEM_MESURES_BODY'); ?></label>
  </div>
  <div class="col-lg-3 col-md-6 col-xs-12">
    <div class="form-group">
      <div class="col-xs-offset-6 col-xs-12">
        <div class="input-group">
          <span class="input-group-addon important_mesures"><?php echo $this->form->getLabel('observation_dugong_mesures_a'); ?><span></span></span>
          <?php echo $this->form->getInput('observation_dugong_mesures_a'); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-xs-12">
    <div class="form-group">
      <div class="col-xs-offset-6 col-xs-12">
        <div class="input-group">
          <span class="input-group-addon"><?php echo $this->form->getLabel('observation_dugong_mesures_b'); ?><span></span></span>
          <?php echo $this->form->getInput('observation_dugong_mesures_b'); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-xs-12">
    <div class="form-group">
      <div class="col-xs-offset-6 col-xs-12">
        <div class="input-group">
          <span class="input-group-addon"><?php echo $this->form->getLabel('observation_dugong_mesures_c'); ?><span></span></span>
          <?php echo $this->form->getInput('observation_dugong_mesures_c'); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-xs-12">
    <div class="form-group">
      <div class="col-xs-offset-6 col-xs-12">
        <div class="input-group">
          <span class="input-group-addon"><?php echo $this->form->getLabel('observation_dugong_mesures_d'); ?><span></span></span>
          <?php echo $this->form->getInput('observation_dugong_mesures_d'); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-xs-12">
    <div class="form-group">
      <div class="col-xs-offset-6 col-xs-12">
        <div class="input-group">
          <span class="input-group-addon"><?php echo $this->form->getLabel('observation_dugong_mesures_e'); ?><span></span></span>
          <?php echo $this->form->getInput('observation_dugong_mesures_e'); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-xs-12">
    <div class="form-group">
      <div class="col-xs-offset-6 col-xs-12">
        <div class="input-group">
          <span class="input-group-addon important_mesures"><?php echo $this->form->getLabel('observation_dugong_mesures_f'); ?><span></span></span>
          <?php echo $this->form->getInput('observation_dugong_mesures_f'); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-xs-12">
    <div class="form-group">
      <div class="col-xs-offset-6 col-xs-12">
        <div class="input-group">
          <span class="input-group-addon"><?php echo $this->form->getLabel('observation_dugong_mesures_g'); ?><span></span></span>
          <?php echo $this->form->getInput('observation_dugong_mesures_g'); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-xs-12">
    <div class="form-group">
      <div class="col-xs-offset-6 col-xs-12">
        <div class="input-group">
          <span class="input-group-addon"><?php echo $this->form->getLabel('observation_dugong_mesures_h'); ?><span></span></span>
          <?php echo $this->form->getInput('observation_dugong_mesures_h'); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-xs-12">
    <div class="form-group">
      <div class="col-xs-offset-6 col-xs-12">
        <div class="input-group">
          <span class="input-group-addon"><?php echo $this->form->getLabel('observation_dugong_mesures_i'); ?><span></span></span>
          <?php echo $this->form->getInput('observation_dugong_mesures_i'); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-xs-12">
    <div class="form-group">
      <div class="col-xs-offset-6 col-xs-12">
        <div class="input-group">
          <span class="input-group-addon"><?php echo $this->form->getLabel('observation_dugong_mesures_j'); ?><span></span></span>
          <?php echo $this->form->getInput('observation_dugong_mesures_j'); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-xs-12">
    <div class="form-group">
      <div class="col-xs-offset-6 col-xs-12">
        <div class="input-group">
          <span class="input-group-addon"><?php echo $this->form->getLabel('observation_dugong_mesures_k'); ?><span></span></span>
          <?php echo $this->form->getInput('observation_dugong_mesures_k'); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-xs-12">
    <div class="form-group">
      <div class="col-xs-offset-6 col-xs-12">
        <div class="input-group">
          <span class="input-group-addon important_mesures"><?php echo $this->form->getLabel('observation_dugong_mesures_l'); ?><span></span></span>
          <?php echo $this->form->getInput('observation_dugong_mesures_l'); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-xs-12">
    <div class="form-group">
      <div class="col-xs-offset-6 col-xs-12">
        <div class="input-group">
          <span class="input-group-addon important_mesures"><?php echo $this->form->getLabel('observation_dugong_mesures_m'); ?><span></span></span>
          <?php echo $this->form->getInput('observation_dugong_mesures_m'); ?>
        </div>
      </div>
    </div>
  </div>
  <div class=" col-lg-12 col-md-12 col-xs-12">
    <label title="<?php echo JText::_('COM_STRANDING_FORMS_EDIT_ITEM_DOLPHIN_MESURES_FACIAL_DISK_DESC'); ?>"><?php echo JText::_('COM_STRANDING_FORMS_EDIT_ITEM_DOLPHIN_MESURES_FACIAL_DISK'); ?></label>
  </div>
  <div class="col-lg-3 col-md-6 col-xs-12">
    <div class="form-group">
      <div class="col-xs-offset-6 col-xs-12">
        <div class="input-group">
          <span class="input-group-addon"><?php echo $this->form->getLabel('observation_dugong_mesures_n'); ?><span></span></span>
          <?php echo $this->form->getInput('observation_dugong_mesures_n'); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-xs-12">
    <div class="form-group">
      <div class="col-xs-offset-6 col-xs-12">
        <div class="input-group">
          <span class="input-group-addon"><?php echo $this->form->getLabel('observation_dugong_mesures_o'); ?><span></span></span>
          <?php echo $this->form->getInput('observation_dugong_mesures_o'); ?>
        </div>
      </div>
    </div>
  </div>
  <div class=" col-lg-12 col-md-12 col-xs-12">
    <label title="<?php echo JText::_('COM_STRANDING_FORMS_EDIT_ITEM_MESURES_PECTORAL_FIN_DESC'); ?>"><?php echo JText::_('COM_STRANDING_FORMS_EDIT_ITEM_MESURES_PECTORAL_FIN'); ?></label>
  </div>
  <div class="col-lg-3 col-md-6 col-xs-12">
    <div class="form-group">
      <div class="col-xs-offset-6 col-xs-12">
        <div class="input-group">
          <span class="input-group-addon"><?php echo $this->form->getLabel('observation_dugong_mesures_p'); ?><span></span></span>
          <?php echo $this->form->getInput('observation_dugong_mesures_p'); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-xs-12">
    <div class="form-group">
      <div class="col-xs-offset-6 col-xs-12">
        <div class="input-group">
          <span class="input-group-addon"><?php echo $this->form->getLabel('observation_dugong_mesures_q'); ?><span></span></span>
          <?php echo $this->form->getInput('observation_dugong_mesures_q'); ?>
        </div>
      </div>
    </div>
  </div>
  <div class=" col-lg-12 col-md-12 col-xs-12">
    <label title="<?php echo JText::_('COM_STRANDING_FORMS_EDIT_ITEM_MESURES_TAIL_FIN_DESC'); ?>"><?php echo JText::_('COM_STRANDING_FORMS_EDIT_ITEM_MESURES_TAIL_FIN'); ?></label>
  </div>
  <div class="col-lg-3 col-md-6 col-xs-12">
    <div class="form-group">
      <div class="col-xs-offset-6 col-xs-12">
        <div class="input-group">
          <span class="input-group-addon"><?php echo $this->form->getLabel('observation_dugong_mesures_r'); ?><span></span></span>
          <?php echo $this->form->getInput('observation_dugong_mesures_r'); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-xs-12">
    <div class="form-group">
      <div class="col-xs-offset-6 col-xs-12">
        <div class="input-group">
          <span class="input-group-addon important_mesures"><?php echo $this->form->getLabel('observation_dugong_mesures_s'); ?><span></span></span>
          <?php echo $this->form->getInput('observation_dugong_mesures_s'); ?>
        </div>
      </div>
    </div>
  </div>
  <div class=" col-lg-12 col-md-12 col-xs-12">
    <label title="<?php echo JText::_('COM_STRANDING_FORMS_EDIT_ITEM_MESURES_BACON_THICKNESS_DESC'); ?>"><?php echo JText::_('COM_STRANDING_FORMS_EDIT_ITEM_MESURES_BACON_THICKNESS'); ?></label>
  </div>
  <div class="col-lg-3 col-md-6 col-xs-12">
    <div class="form-group">
      <div class="col-xs-offset-6 col-xs-12">
        <div class="input-group">
          <span class="input-group-addon"><?php echo $this->form->getLabel('observation_dugong_mesures_t'); ?><span></span></span>
          <?php echo $this->form->getInput('observation_dugong_mesures_t'); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-xs-12">
    <div class="form-group">
      <div class="col-xs-offset-6 col-xs-12">
        <div class="input-group">
          <span class="input-group-addon"><?php echo $this->form->getLabel('observation_dugong_mesures_u'); ?><span></span></span>
          <?php echo $this->form->getInput('observation_dugong_mesures_u'); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-xs-12">
    <div class="form-group">
      <div class="col-xs-offset-6 col-xs-12">
        <div class="input-group">
          <span class="input-group-addon"><?php echo $this->form->getLabel('observation_dugong_mesures_v'); ?><span></span></span>
          <?php echo $this->form->getInput('observation_dugong_mesures_v'); ?>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
<!--Stockage location-->
<div class="row">
 <div class="col-lg-12 col-md-12 col-xs-12">
  <?php echo $this->form->getLabel('observation_location_stock'); ?>
  <div class="input-group">
    <span class="input-group-addon"><span class="fa fa-archive "></span></span>
    <?php echo $this->form->getInput('observation_location_stock'); ?>
  </div>
</div>
</div>
<!--Remarks-->
<div class="row">
 <div class="col-lg-12 col-md-12 col-xs-12">
  <?php echo $this->form->getLabel('remarks'); ?>
  <div class="input-group">
    <span class="input-group-addon"><span class="fa fa-comment "></span></span>
    <?php echo $this->form->getInput('remarks'); ?>
  </div>
</div>
</div>
<!--Admin validation-->
<?php if($user->id != 0){ ?>
 <div class="row">
  <div class="col-lg-12 col-md-12 col-xs-12"><?php echo $this->form->getLabel('admin_validation'); ?></div>
  <div class="col-lg-12 col-md-12 col-xs-12">
    <div class="input-group">
     <span class="input-group-addon"><span class="fa fa-check "></span></span>
     <?php echo $this->form->getInput('admin_validation'); ?>
   </div>
 </div>
</div>
<?php } ?>
<!--Captcha-->
<div class="row">
  <div class="col-lg-12 col-md-12 col-xs-12"><?php echo $this->form->getLabel('captcha'); ?></div>
  <div class="col-lg-12 col-md-12 col-xs-12">
    <div class="input-group">
      <?php echo $this->form->getInput('captcha'); ?>
    </div>
  </div>
</div>
<button type="submit" class="validate"><span><?php echo JText::_('JSUBMIT'); ?></span></button>&nbsp;&nbsp;&nbsp;
<label><?php echo JText::_('OR'); ?></label>&nbsp;&nbsp;&nbsp;
<a href="<?php echo JRoute::_('index.php?option=com_stranding_forms&task=stranding_adminform.cancel'); ?>" title="<?php echo JText::_('JCANCEL'); ?>"><?php echo JText::_('JCANCEL'); ?></a>
<input type="hidden" name="option" value="com_stranding_forms" />
<input type="hidden" name="task" value="stranding_adminform.save" />
<?php echo JHtml::_('form.token'); ?>
</div>
</form>
</div>

