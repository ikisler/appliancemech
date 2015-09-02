<?php
add_action('admin_enqueue_scripts', 'pagebuilder_admin_scripts');
add_action('admin_print_styles', 'pagebuilder_admin_styles');
if (!function_exists('pagebuilder_admin_scripts')) {
    function pagebuilder_admin_scripts() {
        global $pagenow,$post_type;    
        if (current_user_can('edit_posts') && ($pagenow == 'post-new.php' || $pagenow == 'post.php') && ($post_type==='page'||$post_type==='post'||$post_type==='ott_portfolio'||$post_type==='ott_price'||$post_type==='ott_testimonial'||$post_type==='ott_team')) {
            wp_register_script('post-pagebuilder', THEME_DIR . '/framework/assets/js/pagebuilder.js');
            wp_register_script('easy-pie-chart', THEME_DIR . '/assets/js/jquery.easy-pie-chart.js');
            wp_enqueue_script('post-pagebuilder');
            wp_enqueue_script('easy-pie-chart');
			wp_enqueue_script( 'jquery-ui-dialog' );
			
        }	
    }
}
if (!function_exists('pagebuilder_admin_styles')) {
    function pagebuilder_admin_styles() {
        global $pagenow,$post_type;
        if (current_user_can('edit_posts') && ($pagenow == 'post-new.php' || $pagenow == 'post.php') && ($post_type==='page'||$post_type==='post'||$post_type==='ott_portfolio'||$post_type==='ott_price'||$post_type==='ott_testimonial'||$post_type==='ott_team')) {
            wp_register_style('post-pagebuilder', THEME_DIR . '/framework/assets/css/pagebuilder.css', false, '1.00', 'screen');
            wp_register_style('fontello', THEME_DIR . '/assets/css/fontello/css/fontello.css', false, '1.00', 'screen');
            wp_enqueue_style('post-pagebuilder');
			wp_enqueue_style( 'wp-jquery-ui-dialog' );
            wp_enqueue_style('fontello');
        }
    }
}

//====== START - Globals  ======
global $ott_pbItems, $ott_pbHeadSettings, $ott_pbRowSettings;
//Background position
$bgposition = array(
    "left top" => "left top",
    "left center" => "left center",
    "left bottom" => "left bottom",
    "right top" => "right top",
    "right center" => "right center",
    "right bottom" => "right bottom",
    "center top" => "center top",
    "center center" => "center center",
    "center bottom" => "center bottom"
);
//Sidebar
$arraySidebar = array("Default sidebar" => "Default sidebar");
$sidebars = get_option('sbg_sidebars');
if (!empty($sidebars)) {
    foreach ($sidebars as $sidebar) {
        $arraySidebar[$sidebar] = $sidebar;
    }
}

function onetouch_revslider_sliders_enabled()
{
	if ( class_exists( 'revslider' ) ){ return true; }
	return false;
}

if(onetouch_revslider_sliders_enabled())
		{

//Slider
 global $wpdb;
$table_name = $wpdb->prefix . "revslider_sliders";
$sliders = $wpdb->get_results( "SELECT * FROM $table_name" );
$arraySlider  = array("0" => "Select Slider");
if(!empty($sliders)) {
    foreach($sliders as $item) {
        $name = empty($item->title) ? ('Unnamed('.$item->id.')') : $item->title;
        $arraySlider[$item->id]=$name;
    }
}

		}

else {
		$arraySlider  = array("0" => "Select Slider");
}



//General Animation
$genAnimationArray = array('none'=>'No Animation','flipInX'=>'flipInX','flipInY'=>'flipInY','fadeIn'=>'fadeIn','fadeInUp'=>'fadeInUp','fadeInDown'=>'fadeInDown','fadeInLeft'=>'fadeInLeft','fadeInRight'=>'fadeInRight','fadeInUpBig'=>'fadeInUpBig','fadeInDownBig'=>'fadeInDownBig','fadeInLeftBig'=>'fadeInLeftBig','fadeInRightBig'=>'fadeInRightBig','bounceIn'=>'bounceIn','bounceInDown'=>'bounceInDown','bounceInUp'=>'bounceInUp','bounceInLeft'=>'bounceInLeft','bounceInRight'=>'bounceInRight','rotateIn'=>'rotateIn','rotateInDownLeft'=>'rotateInDownLeft','rotateInDownRight'=>'rotateInDownRight','rotateInUpLeft'=>'rotateInUpLeft','rotateInUpRight'=>'rotateInUpRight','lightSpeedIn'=>'lightSpeedIn','rollIn'=>'rollIn');
//Link Target
$linkTarget = array("_blank" => "Blank", "_self" => "Self");
//Yes No
$arrayYesNo = array("true" => "Yes", "false" => "No");
//Post Type
$arrayPostType = array("post" => "Post", "portfolio" => "Portfolio");


//Post Catigories
$categories = get_categories("hide_empty=0");
$post_categories = array("0" => "Select Category");
if(!empty($categories)) {
    foreach ($categories as $category) {
        $post_categories["$category->term_id"] = $category->name;
    }
}
//Portfolio Catigories
$portfolios = get_terms('cat_portfolio', 'hide_empty=0');
$port_categories = array("0" => "Select Category");
if(!empty($portfolios)) {
    foreach ($portfolios as $portfolio) {
        $port_categories["$portfolio->term_id"] = $portfolio->name;
    }
}
//Pricing Table Catigories
$prices = get_terms('cat_price', 'hide_empty=0');
$price_categories = array("0" => "Select Category");
if(!empty($prices)) {
    foreach ($prices as $price) {
        $price_categories["$price->term_id"] = $price->name;
    }
}
//Team Catigories
$teams = get_terms('cat_team', 'hide_empty=0');
$team_categories = array("0" => "Select Category");
if(!empty($teams)) {
    foreach ($teams as $team) {
        $team_categories["$team->term_id"] = $team->name;
    }
}
//Testimonials Catigories
$testimonials = get_terms('cat_testimonial', 'hide_empty=0');
$testim_categories = array("0" => "Select Category");
if(!empty($testimonials)) {
    foreach ($testimonials as $testimonial) {
        $testim_categories["$testimonial->term_id"] = $testimonial->name;
    }
}
//partners Catigories
$partners = get_terms('cat_partner', 'hide_empty=0');
$partner_categories = array("0" => "Select Category");
if(!empty($partners)) {
    foreach ($partners as $partner) {
        $partner_categories["$partner->term_id"] = $partner->name;
    }
}
//includes
require_once (THEME_PATH . "/framework/pagebuilder/elements.php");
require_once (THEME_PATH . "/framework/pagebuilder/pagebuilder_render.php");
//====== END   - Globals   ======
//====== START - Functions ======
if (!function_exists('pbInitGlobalScripts')) {
    function pbInitGlobalScripts() {
        global $post;
        $pID='';
        if(isset($post->ID)){
            $pID=$post->ID;
        }
        echo'<script type="text/javascript">var $homeURI="' . home_url() . '";var pID="' . $pID . '";</script>';
    }
} add_action('admin_footer', 'pbInitGlobalScripts');

if (!function_exists('pbTextToFoundation')) {
    function pbTextToFoundation($size = '1 / 3') {
        switch ($size) {
            case'size-1-4' :
            case'1 / 4' : {
                $size = 'span3';
                break;
            }
            case'size-1-3' :
            case'1 / 3' : {
                $size = 'span4';
                break;
            }
            case'size-1-2' :
            case'1 / 2' : {
                $size = 'span6';
                break;
            }
            case'size-2-3' :
            case'2 / 3' : {
                $size = 'span8';
                break;
            }
            case'size-3-4' :
            case'3 / 4' : {
                $size = 'span9';
                break;
            }
            case'size-1-1' :
            case'1 / 1' : {
                $size = 'span12';
                break;
            }
        }
        return $size;
    }
}
if (!function_exists('pbTextToInt')) {
    function pbTextToInt($size = '1 / 3') {
        switch ($size) {
            case'size-1-4' :
            case'1 / 4' : {
                $size = 3;
                break;
            }
            case'size-1-3' :
            case'1 / 3' : {
                $size = 4;
                break;
            }
            case'size-1-2' :
            case'1 / 2' : {
                $size = 6;
                break;
            }
            case'size-2-3' :
            case'2 / 3' : {
                $size = 8;
                break;
            }
            case'size-3-4' :
            case'3 / 4' : {
                $size = 9;
                break;
            }
            case'size-1-1' :
            case'1 / 1' : {
                $size = 12;
                break;
            }
        }
        return $size;
    }
}

if (!function_exists('pbSizeToText')) {
    function pbSizeToText($size = 'size-1-3') {
        switch ($size) {
            case'size-1-4' : {
                $size = '1 / 4';
                break;
            }
            case'size-1-3' : {
                $size = '1 / 3';
                break;
            }
            case'size-1-2' : {
                $size = '1 / 2';
                break;
            }
            case'size-2-3' : {
                $size = '2 / 3';
                break;
            }
            case'size-3-4' : {
                $size = '3 / 4';
                break;
            }
            case'size-1-1' : {
                $size = '1 / 1';
                break;
            }
        }
        return $size;
    }
}

if (!function_exists('pbTextToSize')) {
    function pbTextToSize($size = '1 / 3') {
        switch ($size) {
            case'1 / 4' : {
                $size = 'size-1-4';
                break;
            }
            case'1 / 3' : {
                $size = 'size-1-3';
                break;
            }
            case'1 / 2' : {
                $size = 'size-1-2';
                break;
            }
            case'2 / 3' : {
                $size = 'size-2-3';
                break;
            }
            case'3 / 4' : {
                $size = 'size-3-4';
                break;
            }
            case'1 / 1' : {
                $size = 'size-1-1';
                break;
            }
        }
        return $size;
    }
}

if (!function_exists('getItemField')) {
    function getItemField($itemSlug, $itemArray) {
        $title = isset($itemArray['title']) ? $itemArray['title'] : '';
        $type = isset($itemArray['type']) ? $itemArray['type'] : '';
        $default = isset($itemArray['default']) ? $itemArray['default'] : '';
        $desc = isset($itemArray['desc']) ? $itemArray['desc'] : '';
        $holder = isset($itemArray['holder']) ? $itemArray['holder'] : '';
        $selector = isset($itemArray['selector']) ? $itemArray['selector'] : '';
        $save_to = isset($itemArray['save_to']) ? $itemArray['save_to'] : '';
        $tinyMCE = isset($itemArray['tinyMCE']) ? $itemArray['tinyMCE'] : '';
        $class = 'field'; ?>
        <div class="field-item<?php echo $type === 'hidden' ? ' hidden' : ''; echo' type-' . $type; echo $tinyMCE?' editor':''; echo " ".$itemSlug; ?>"><?php
            if($type!='container'){
                echo '<div class="field-title">'.$title.'</div>';
                $default = rawUrlDecode($default);
            } ?>
            <div class="field-data"><?php
                switch ($type) {
                    case 'cc' : { ?>
                        <div class="button show-cc-modal"><?php _e('Edit Chart','otouch'); ?></div>
                        <div class="cc-viewer" style="padding: 20px 0;"></div><?php
                        break;
                    }
                    case 'fa' : { ?>
                        <div class="button show-fa-modal"><?php _e('Edit Icon','otouch'); ?></div>
                        <div class="fa-viewer" style="padding: 20px 0;"></div><?php
                        break;
                    }
                    case 'hidden':
                    case 'button':
                    case 'text' : { ?>
                        <input    data-name="<?php echo $itemSlug; ?>" data-type="<?php echo $type; ?>" class="<?php echo $class; ?>" value="<?php echo htmlspecialchars($default); ?>" placeholder="<?php echo $holder; ?>" data-selector="<?php echo $selector; ?>" data-save-to="<?php echo $save_to; ?>" type="<?php echo $type; ?>" /><?php
                        if (!empty($itemArray['data'])) {
                            global $ott_pbItems;
                            echo '<div class="data hidden">';
                            $tmpItem = $itemArray['data']['item'];
                            $tmpSettings = $itemArray['data']['settings'];
                            getItemField($tmpSettings, $ott_pbItems[$tmpItem]['settings'][$tmpSettings]);
                            echo '</div>';
                        }
                        break;
                    }
                    case 'color': { ?>
                        <div style="background-color: <?php echo empty($default)?'':$default; ?>;" class="color-info"></div>
                        <input    data-name="<?php echo $itemSlug; ?>" data-type="<?php echo $type; ?>" class="<?php echo $class; ?>" value="<?php echo empty($default)?'':$default; ?>" placeholder="<?php echo $holder; ?>" type="text" /><?php
                        break;
                    }
                    case 'checkbox': { ?>
                        <input    data-name="<?php echo $itemSlug; ?>" data-type="<?php echo $type; ?>" class="<?php echo $class; ?> hidden" value="<?php echo $default; ?>" placeholder="<?php echo $holder; ?>" type="checkbox" <?php echo $default==='true'?'checked':''; ?> />
                        <div class="checkbox-text clearfix"><div class="checkbox-true"><?php _e('ON','otouch'); ?></div><div class="checkbox-false"><?php _e('OFF','otouch'); ?></div></div><?php
                        break;
                    }
                    case 'textArea': { ?>
                        <textarea data-name="<?php echo $itemSlug; ?>" data-type="<?php echo $type; ?>" class="<?php echo $class; ?>" placeholder="<?php echo $holder; ?>" data-tinyMCE="<?php echo $tinyMCE; ?>" ><?php echo $default; ?></textarea><?php
                        break;
                    }
                    case 'category':
                    case 'select': { ?>
                        <select   data-name="<?php echo $itemSlug; ?>" data-type="<?php echo $type; ?>" class="<?php echo $class; ?>"><?php
                            $hide = isset($itemArray['hide']) ? $itemArray['hide'] : '';
                            foreach ($itemArray['options'] as $val => $text) {
                                echo '<option value="' . $val . '"' . ($default === strval($val) ? ' selected="selected"' : '') . ' hide="' . (isset($hide[$val]) ? $hide[$val] : '') . '">' . $text . '</option>';
                            } ?>
                        </select>
                        <span class="select-text"></span><?php
                        if($type === 'category'){
                            echo '<div class="category-list-container"></div>';
                        }
                        break;
                    }
                    case 'container': {
                        $title_as = isset($itemArray['title_as']) ? $itemArray['title_as'] : '';
                        $add_button = isset($itemArray['add_button']) ? $itemArray['add_button'] : '';
                        $container_type = isset($itemArray['container_type']) ? $itemArray['container_type'] : ''; ?>
                        <div data-name="<?php echo $itemSlug; ?>" data-type="<?php echo $type; ?>" data-container-type="<?php echo $container_type; ?>" class="<?php echo $class; ?> container" placeholder="<?php echo $holder; ?>" data-title-as="<?php echo $title_as; ?>" data-add-button="<?php echo $add_button; ?>" ><?php
                            if(!empty($default)) {
                                foreach ($default as $data) { ?>
                                    <div class="container-item<?php echo $container_type==='image_slider'?' expanded':''; ?>">
                                        <div class="list clearfix">
                                            <div class="name"><?php if(isset($data[$title_as]['default'])){echo $data[$title_as]['default'];} ?></div>
                                            <div class="actions">
                                                <a href="#" class="action-expand"><span class="opened"></span><span class="closed"></span></a>
                                                <a href="#" class="action-duplicate" title="Duplicate"></a>
                                                <a href="#" class="action-delete"  title="Delete"></a>
                                            </div>
                                        </div>
                                        <div class="content"><?php
                                            if($container_type==='image_slider'){
                                                echo '<img class="image-src" src="'.rawUrlDecode($data[$title_as]['default']).'" />';
                                            }
                                            $ccPrint=$faPrint=true;
                                            foreach ($data as $slug => $setting) {
                                                //Font Awesome
                                                if(isset($setting['need_fa'])&&$setting['need_fa']==='true'&&$faPrint){
                                                    echo getItemField('fa', array("type"=>"fa","title"=>"Add Icon"));
                                                }
                                                if($slug==='fa'){$faPrint=false;}
                                                //Circle Chart
                                                if(isset($setting['need_cc'])&&$setting['need_cc']==='true'&&$ccPrint){
                                                    echo getItemField('cc', array("type"=>"cc","title"=>"Add Chart"));
                                                }
                                                if($slug==='cc'){$ccPrint=false;}
                                                echo getItemField($slug, $setting);
                                            } ?>
                                        </div>
                                    </div><?php
                                }
                            }?>
                        </div><?php
                        break;
                    }
                } ?>
            </div><?php
            if($type!='container'){ echo '<div class="field-desc">'.$desc.'</div>';} ?>
        </div><?php
    }
}

if (!function_exists('pbGetItem')) {
    function pbGetItem($itemSlug, $itemNewData = array(),$all=true) {
        global $ott_pbHeadSettings, $ott_pbItems;
        $itemArray = $ott_pbItems[$itemSlug];
        $itemArray['size'] = empty($itemNewData['size']) ? $itemArray['size'] : pbTextToSize($itemNewData['size']);
        ob_start(); ?>
        <div class="action-container item <?php echo $itemArray['size']; ?>" data-slug="<?php echo $itemSlug; ?>"<?php if(isset($itemArray['min-size'])){echo ' data-min="'.$itemArray['min-size'].'"';} ?> data-help="<?php echo isset($itemArray['help'])?$itemArray['help']:''; ?>">
            <div class="thumb"><span class="<?php echo $itemSlug; ?>"></span><?php echo $itemArray['name']; ?></div><?php
            if($all){ ?>
                <div class="list clearfix">
                    <div class="size-sizer-container">
                        <div class="size"><?php echo pbSizeToText($itemArray['size']); ?></div>
                        <div class="sizer"><a class="up" href="#" title="Increase Size"></a><a class="down" href="#" title="Decrease Size"></a></div>
                    </div>
                    <div class="name"><?php echo $itemArray['name']; ?></div>
                    <div class="actions">
                        <a href="#" class="action-edit" title="Edit"></a>
                        <a href="#" class="action-duplicate" title="Duplicate"></a>
                        <a href="#" class="action-delete" title="Delete"></a>
                    </div>
                </div>
                <div class="data">
                    <div class="general-field-container"><?php
                        foreach ($ott_pbHeadSettings as $pbHeadSettingSlug => $pbHeadSetting) {
                            $pbHeadSetting['default'] = isset($itemNewData[$pbHeadSettingSlug]) ? $itemNewData[$pbHeadSettingSlug] : $pbHeadSetting['default'];
                            echo getItemField($pbHeadSettingSlug, $pbHeadSetting);
                        } ?>
                    </div>
                    <div class="custom-field-container"><?php
                        foreach ($itemArray['settings'] as $pbItemSettingSlug => $pbItemSetting) {
                            if ($pbItemSetting['type'] === 'container' && isset($itemNewData['settings'][$pbItemSettingSlug])) {
                                $templateContainerItem = $pbItemSetting['default'][0];
                                foreach ($itemNewData['settings'][$pbItemSettingSlug] as $index => $containerItemNewData) {
                                    foreach ($containerItemNewData as $containerItemNewFieldSlug => $containerItemNewFieldValue) {
                                        $templateContainerItem[$containerItemNewFieldSlug]['default'] = $containerItemNewFieldValue;
                                        $itemNewData['settings'][$pbItemSettingSlug][$index][$containerItemNewFieldSlug] = $templateContainerItem[$containerItemNewFieldSlug];
                                    }
                                }
                            }
                            $pbItemSetting['default'] = isset($itemNewData['settings'][$pbItemSettingSlug]) ? $itemNewData['settings'][$pbItemSettingSlug] : $pbItemSetting['default'];
                            echo getItemField($pbItemSettingSlug, $pbItemSetting);
                        } ?>
                    </div>
                </div><?php
            } ?>
        </div><?php
        $output = ob_get_clean();
        return $output;
    }
}
if (!function_exists('pbSection')) {
    function pbSection() {
        add_meta_box('cmeta_pagebuilder', __('Page Builder', 'cmeta_pagebuilder_td'), 'pbSectionBox', 'page', 'normal', 'high');
    }
} 
if (ott_option('pagebuilder')){
    add_action('admin_print_styles', 'pbSection', 1);
}

function pbGetRowTools($rowNewData=array()) {
    global $ott_pbRowSettings,$itemsTumb;
    $rowNewData['row_layout'] = isset($rowNewData['row_layout'])?$rowNewData['row_layout']:'full';
    $output ='<div class="list clearfix">';
        $output.='<div class="add-element">';
            $output.='<a href="#" class="elements-dropdown clearfix">Add Element</a>';
            $output.='<div class="pagebuilder-elements-container" class="clearfix">' . $itemsTumb . '</div>';
        $output.='</div>';

        $output.='<div class="name">Container Settings</div>';
        $output.='<div class="actions">';
            $output.='<a href="#" class="action-edit tooltip"><span>Edit Settings</span></a>';
            $output.='<a href="#" class="action-duplicate tooltip"><span>Duplicate</span></a>';
            $output.='<a href="#" class="action-delete tooltip"><span>Delete</span></a>';
            $output.='<a href="#" class="action-expand tooltip"><span>Close</span></a>';
        $output.='</div>';
		        $output.='<div class="change-layout">';
            $output.='<a href="#" class="sidebar left-sidebar tooltip' .($rowNewData['row_layout']==='left' ?' active':'').'" data-value="1-4,3-4,0-0" data-input="left" ><span>Left Sidebar</span></a>';
            $output.='<a href="#" class="sidebar full tooltip'         .($rowNewData['row_layout']==='full' ?' active':'').'" data-value="0-0,1-1,0-0" data-input="full" ><span>Full Width</span></a>';
            $output.='<a href="#" class="sidebar right-sidebar tooltip'.($rowNewData['row_layout']==='right'?' active':'').'" data-value="0-0,3-4,1-4" data-input="right"><span>Right Sidebar</span></a>';
        $output.='</div>';
    $output.='</div>';
    $output.='<div class="data">';
        $output.='<div class="custom-field-container">';
            foreach ($ott_pbRowSettings as $pbRowSettingSlug => $pbRowSetting){
                $pbRowSetting['default'] = isset($rowNewData[$pbRowSettingSlug]) ? $rowNewData[$pbRowSettingSlug] : $pbRowSetting['default'];
                ob_start();
                getItemField($pbRowSettingSlug, $pbRowSetting);
                $output.=ob_get_clean();
            }
        $output.='</div>';
    $output.='</div>';
    return $output;
}
function pbGetLayout($_pb_layout) {
    $output  = '<div class="action-container clearfix builder-area '.$_pb_layout['size'].'">';
        if(isset($_pb_layout['items'])&&is_array($_pb_layout['items'])){
            foreach ($_pb_layout['items'] as $item_array) {
                $output .= pbGetItem($item_array['slug'], $item_array);
            }
        }
    $output .= '</div>';
    return $output;
}
function pbGetRow($_pb_row=array()) {
    $output  = '<div class="row-container action-container clearfix '.(isset($_pb_row['default_row'])&&$_pb_row['default_row']==='true'?'default':'additional').'-row">';
        $output .= pbGetRowTools($_pb_row);
        if(isset($_pb_row['layouts'])&&is_array($_pb_row['layouts'])){
            foreach($_pb_row['layouts'] as $_pb_layout){
                $output .= pbGetLayout($_pb_layout);
            }
        }else{
            foreach(array('size-0-0','size-1-1','size-0-0')as$size){
                $output .= pbGetLayout(array('size'=>$size));
            }
        }
    $output .= '</div>';
    return $output;
}
if (!function_exists('pbSectionBox')){
    function pbSectionBox(){
        global $post, $ott_pbItems,$items,$itemsTumb;
        $items     = '';
        $itemsTumb = '';
        foreach ($ott_pbItems as $pbItemSlug => $pbItemArray) {
            if(empty($pbItemArray['only']) || $pbItemArray['only']==='builder'){
                $items     .= pbGetItem($pbItemSlug);
                $itemsTumb .= pbGetItem($pbItemSlug,array(),false);
            }
        }
        $_pb_content_area = '';
        $_pb_content = get_post_meta($post->ID, '_pb_content', true);
        $_pb_rows = json_decode(rawUrlDecode($_pb_content), true);
        if(!empty($_pb_rows)&&is_array($_pb_rows)){
            foreach($_pb_rows as $_pb_row){
                $_pb_content_area .= pbGetRow($_pb_row);
            }
        }else{
            $_pb_content_area .= pbGetRow(array('default_row'=>'true'));
        }
        
        $layoutAddButtons  = '<div class="pb-add-layout-conteiner">';
//            $layoutAddButtons .= '<a href="#" class="pb-add-layout" data-possition="top">'   .__('Add Top'   ,'otouch').'</a>';
            $layoutAddButtons .= '<a href="#" class="pb-add-layout" data-possition="bottom">'.__('Add Container','otouch').'</a>';
            $layoutAddButtons .= '<div class="data hidden">'.pbGetRow().'</div>';
            $layoutAddButtons .= '<div class="loader">Loading...</div>';
        $layoutAddButtons .= '</div>';
        $templates = '<div class="ott-template-container">';
            $templates .= '<div id="template-save" class="dropdown" tabindex="1">';
            $templates .= '<div class="template"><span class="image-save"></span>Templates</div>';
                $templates .= '<ul class="dropdown template-container">';
                    $templates .= '<li class="template-item"><a class="template-add">Save this to Template</a></li>';
                    $templates_array = get_option('ott_pb_'.strtolower(THEMENAME).'_templates');
                    if ($templates_array !== false) {
                        foreach ($templates_array as $templates_name => $templates_content) {
                            $templates .= '<li class="template-item"><a class="template-name">' . $templates_name . '</a><span class="template-delete">X</span></li>';
                        }
                    }
                $templates .= '</ul>';
            $templates .= '</div>';
        $templates .= '</div>';
        
        $pbAdditionalTools = $layoutAddButtons.$templates;
        wp_nonce_field(plugin_basename(__FILE__), 'myplugin_noncename');
        echo '<div class="pagebuilder-container">';
           echo'<textarea id="pb_content" name="pb_content" class="hidden">' . $_pb_content . '</textarea>
                <ul id="size-list" class="hidden">
                    <li data-class="size-1-4" data-text="1 / 4" class="min"></li>
                    <li data-class="size-1-3" data-text="1 / 3"></li>
                    <li data-class="size-1-2" data-text="1 / 2"></li>
                    <li data-class="size-2-3" data-text="2 / 3"></li>
                    <li data-class="size-3-4" data-text="3 / 4"></li>
                    <li data-class="size-1-1" data-text="1 / 1" class="max"></li>
                </ul>
                <div id="items-list" class="hidden">'.$items.'</div>
                ' . $pbAdditionalTools . '
                <div id="pagebuilder-area" class="clearfix">'.$_pb_content_area.'</div>
            </div>';
    }
}

// Save fields data
if (!function_exists('pbSectionBoxSavePostData')) {
    function pbSectionBoxSavePostData($post_id) {
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
            return $post_id;
        if (isset($_GET['post_type']) && 'page' == $_GET['post_type']) {
            if (!current_user_can('edit_page', $post_id))
                return $post_id;
        } else {
            if (!current_user_can('edit_post', $post_id))
                return $post_id;
        }
        if (isset($_POST['pb_content'])) {
            update_post_meta($post_id, '_pb_content', $_POST['pb_content']);
        }
//        if (isset($_POST['pb_content'])) {
//            set_metabox('layout',$_POST['pb-page-layout']);
//        }
    }
} add_action('save_post', 'pbSectionBoxSavePostData');

// Template Ajax Action
if (!function_exists('pbTemplateAdd') && is_user_logged_in()) {
    function pbTemplateAdd() {
        if (isset($_REQUEST['template_name']) && isset($_REQUEST['template_content'])) {
            $response = '';
            $templates_array = get_option('ott_pb_'.strtolower(THEMENAME).'_templates',array());
            if (isset($templates_array[$_REQUEST['template_name']])) {
                $response .= '<div class="error">' . __('Template name is already exist. Please insert the template name and try again', 'otouch') . '</div>';
            } else {
                $templates_array[$_REQUEST['template_name']] = 'true';
                update_option('ott_pb_'.strtolower(THEMENAME).'_templates', $templates_array);
                update_option('ott_pb_'.strtolower(THEMENAME).'_templates_'.$_REQUEST['template_name'], $_REQUEST['template_content']);
                
                $response .= '<div class="succes">' . __('Template added', 'otouch') . '</div>';
            }
            die('<div class="response">' . $response . '</div>');
        }
    }
} add_action('wp_ajax_template_add', 'pbTemplateAdd');

if (!function_exists('pbTemplateGet') && is_user_logged_in()) {
    function pbTemplateGet() {
        if (isset($_REQUEST['template_name'])) {
            $response = '';
            $templates_array = get_option('ott_pb_'.strtolower(THEMENAME).'_templates',array());
            $currTemplate    = get_option('ott_pb_'.strtolower(THEMENAME).'_templates_'.$_REQUEST['template_name'],false);
            if (isset($templates_array[$_REQUEST['template_name']])&&$currTemplate!==false) {
                $response .= '<div class="data">';
                $response .= '<div class="content">'. rawUrlDecode($currTemplate) . '</div>';
                $response .= '</div>';
            } else {
                $response .= '<div class="error">' . __('Template name not exsist', 'otouch') . '</div>';
            }
            die('<div class="response">' . $response . '</div>');
        }
    }
} add_action('wp_ajax_template_get', 'pbTemplateGet');

if (!function_exists('pbTemplateRemove') && is_user_logged_in()) {
    function pbTemplateRemove() {
        if (isset($_REQUEST['template_name'])) {
            $response = '';
            $templates_array = get_option('ott_pb_'.strtolower(THEMENAME).'_templates');
            if (isset($templates_array[$_REQUEST['template_name']])) {
                unset($templates_array[$_REQUEST['template_name']]);
                update_option('ott_pb_'.strtolower(THEMENAME).'_templates', $templates_array);
                update_option('ott_pb_'.strtolower(THEMENAME).'_templates_'.$_REQUEST['template_name'], '');
            } else {
                $response .= '<div class="error">' . __('Template name not exsist', 'otouch') . '</div>';
            }
            die('<div class="response">' . $response . '</div>');
        }
    }
} add_action('wp_ajax_template_remove', 'pbTemplateRemove');

if (!function_exists('pbGetFontawesome') && is_user_logged_in()) {
    function pbGetFontawesome() {
        require_once (THEME_PATH . "/framework/pagebuilder/font-awesome.php");
        die();
    }
} add_action('wp_ajax_get_fontawesome', 'pbGetFontawesome');

if (!function_exists('pbGetCircleChart') && is_user_logged_in()) {
    function pbGetCircleChart() {
        require_once (THEME_PATH . "/framework/pagebuilder/circle-chart.php");
        die();
    }
} add_action('wp_ajax_get_circlechart', 'pbGetCircleChart');
//====== END   - Functions ====== ?>