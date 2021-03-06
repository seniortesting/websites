<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<link rel="dns-prefetch" href="//apps.bdimg.com">
<meta http-equiv="X-UA-Compatible" content="IE=11,IE=10,IE=9,IE=8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
<meta name="apple-mobile-web-app-title" content="<?php echo get_bloginfo('name') ?>">
<meta http-equiv="Cache-Control" content="no-siteapp">
<title><?php echo _title(); ?></title>
<?php wp_head(); ?>
<link rel="shortcut icon" href="<?php echo home_url() . '/favicon.ico' ?>">
<!--[if lt IE 9]><script src="<?php echo get_stylesheet_directory_uri() ?>/js/libs/html5.min.js"></script><![endif]-->
<?php tb_xzh_head_var() ?>
</head>
<body <?php body_class(_bodyclass()); ?>>
<?php tb_xzh_render_head() ?>
<header class="header">
	<div class="container">
		<?php _the_logo(); ?>
		<?php  
			$_brand = _hui('brand');
			if( $_brand ){
				$_brand = explode("\n", $_brand);
				echo '<div class="brand">' . $_brand[0] . '<br>' . $_brand[1] . '</div>';
			}
		?>
		<ul class="site-nav site-navbar">
			<?php _the_menu('nav') ?>
			<?php if( !is_search() && ((_hui('pc_search')&&!wp_is_mobile()) || (_hui('m_search')&&wp_is_mobile())) ){ ?>
				<li class="navto-search"><a href="javascript:;" class="search-show active"><i class="fa fa-search"></i></a></li>
			<?php } ?>
		</ul>
		<?php if( !_hui('topbar_off') ){ ?>
		<div class="topbar">
			<ul class="site-nav topmenu">
				<?php _the_menu('topmenu') ?>
				<?php if( _hui('guanzhu_b') ){ ?>
				<li class="menusns menu-item-has-children">
					<a href="javascript:;"><?php echo _hui('sns_txt') ?></a>
					<ul class="sub-menu">
						<?php if(_hui('wechat')){ echo '<li><a class="sns-wechat" href="javascript:;" title="'._hui('wechat').'" data-src="'._hui('wechat_qr').'">'._hui('wechat').'</a></li>'; } ?>
						<?php for ($i=1; $i < 10; $i++) { 
							if( _hui('sns_tit_'.$i) && _hui('sns_link_'.$i) ){ 
								echo '<li><a target="_blank" rel="external nofollow" href="'._hui('sns_link_'.$i).'">'. _hui('sns_tit_'.$i) .'</a></li>'; 
							}
						} ?>
					</ul>
				</li>
				<?php } ?>
			</ul>
			<?php if( is_user_logged_in() ): global $current_user; ?>
				<?php _moloader('mo_get_user_page', false) ?>
				Hi, <?php echo $current_user->display_name ?>
				<?php if( _hui('user_page_s') ){ ?>
					&nbsp; &nbsp; <a rel="nofollow" href="<?php echo mo_get_user_page() ?>">??????????????????</a>
				<?php } ?>
				<?php if( is_super_admin() ){ ?>
					&nbsp; &nbsp; <a rel="nofollow" target="_blank" href="<?php echo site_url('/wp-admin/') ?>">????????????</a>
				<?php } ?>
			<?php elseif( _hui('user_page_s') ): ?>
				<?php _moloader('mo_get_user_rp', false) ?>
				<a rel="nofollow" href="javascript:;" class="signin-loader">Hi, ?????????</a>
				&nbsp; &nbsp; <a rel="nofollow" href="javascript:;" class="signup-loader">????????????</a>
				&nbsp; &nbsp; <a rel="nofollow" href="<?php echo mo_get_user_rp() ?>">????????????</a>
			<?php endif; ?>
		</div>
		<?php } ?>
		<?php if( _hui('m_navbar') ){ ?>
		<i class="fa fa-bars m-icon-nav"></i>
		<?php } ?>
	</div>
</header>
<div class="site-search">
	<div class="container">
		<?php  
			if( _hui('search_baidu') && _hui('search_baidu_code') ){
				echo '<form class="site-search-form"><input id="bdcsMain" class="search-input" type="text" placeholder="???????????????"><button class="search-btn" type="submit"><i class="fa fa-search"></i></button></form>';
				echo _hui('search_baidu_code');
			}else{
				echo '<form method="get" class="site-search-form" action="'.esc_url( home_url( '/' ) ).'" ><input class="search-input" name="s" type="text" placeholder="???????????????" value="'.htmlspecialchars($s).'"><button class="search-btn" type="submit"><i class="fa fa-search"></i></button></form>';
			}
		?>
	</div>
</div>