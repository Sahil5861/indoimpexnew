<style>
	:root {
		--bg-main: #fff;
	}
	
	.navbar{
		background-color: var(--bg-main);
	}
	/* .page-header{
		background-color: var(--bg-main);
	}
	.card{
		background-color: var(--bg-main);
	} */
</style>

<style>
	a:hover{
		text-decoration: none;
	}
</style>

<?php 
	$hasBoppAccess = in_array('bopp-stock.items.view', $allowedRoutes) || in_array('bopp-stock.categories.view', $allowedRoutes);
	$hasNonWovenAccess = in_array('admin.NonWoven.items.view', $allowedRoutes) || in_array('admin.NonWoven.categories.view', $allowedRoutes);
?>

<!-- Main navbar -->
	<div class="navbar navbar-dark navbar-expand-lg navbar-static px-lg-0">
		<div class="container-fluid container-boxed jusitfy-content-start">
			<div class="navbar-brand flex-1 flex-lg-0">
				<a href="index.html" class="d-inline-flex align-items-center">
					<img src="{{asset('assets/images/logo.webp')}}" style="height: 70px;" alt=""> 
					{{-- <img src="../../../assets/images/logo_text_light.svg" class="d-none d-sm-inline-block h-16px ms-3" alt=""> --}}
				</a>
			</div>

			<ul class="nav order-2 order-lg-1 ms-2 ms-lg-3 me-lg-auto">
				{{-- <li class="nav-item nav-item-dropdown-lg dropdown">
					<a href="#" class="navbar-nav-link navbar-nav-link-icon rounded-pill" data-bs-toggle="dropdown">
						<i class="ph-squares-four"></i>
					</a>

					<div class="dropdown-menu dropdown-menu-scrollable-sm wmin-lg-600 p-0">
						<div class="d-flex align-items-center border-bottom p-3">
							<h6 class="mb-0">Browse apps</h6>
							<a href="#" class="ms-auto">
								View all
								<i class="ph-arrow-circle-right ms-1"></i>
							</a>
						</div>

						<div class="row row-cols-1 row-cols-sm-2 g-0">
							<div class="col">
								<button type="button" class="dropdown-item text-wrap h-100 align-items-start border-end-sm border-bottom p-3">
									<div>
										<img src="../../../assets/images/demo/logos/1.svg" class="h-40px mb-2" alt="">
										<div class="fw-semibold my-1">Customer data platform</div>
										<div class="text-muted">Unify customer data from multiple sources</div>
									</div>
								</button>
							</div>

							<div class="col">
								<button type="button" class="dropdown-item text-wrap h-100 align-items-start border-bottom p-3">
									<div>
										<img src="../../../assets/images/demo/logos/2.svg" class="h-40px mb-2" alt="">
										<div class="fw-semibold my-1">Data catalog</div>
										<div class="text-muted">Discover, inventory, and organize data assets</div>
									</div>
								</button>
							</div>

							<div class="col">
								<button type="button" class="dropdown-item text-wrap h-100 align-items-start border-end-sm border-bottom border-bottom-sm-0 rounded-bottom-start p-3">
									<div>
										<img src="../../../assets/images/demo/logos/3.svg" class="h-40px mb-2" alt="">
										<div class="fw-semibold my-1">Data governance</div>
										<div class="text-muted">The collaboration hub and data marketplace</div>
									</div>
								</button>
							</div>

							<div class="col">
								<button type="button" class="dropdown-item text-wrap h-100 align-items-start rounded-bottom-end p-3">
									<div>
										<img src="../../../assets/images/demo/logos/4.svg" class="h-40px mb-2" alt="">
										<div class="fw-semibold my-1">Data privacy</div>
										<div class="text-muted">Automated provisioning of non-production datasets</div>
									</div>
								</button>
							</div>
						</div>
					</div>
				</li> --}}
			</ul>
			<ul class="nav order-3 ms-lg-2">			
				<li class="nav-item nav-item-dropdown-lg dropdown ms-lg-2">
					<a href="#" class="navbar-nav-link align-items-center rounded-pill p-1" data-bs-toggle="dropdown">
						<div class="status-indicator-container">
							<img src="{{asset('assets/images/avtar.webp')}}" class="w-32px h-32px rounded-pill" alt="">
							<span class="status-indicator bg-success"></span>
						</div>
						<span class="d-none d-lg-inline-block mx-lg-2 text-dark">{{ ucfirst(Auth::user()->name) }}</span>
					</a>

					<div class="dropdown-menu dropdown-menu-end">
						<a href="#" class="dropdown-item">
							<i class="ph-user-circle me-2"></i>
							My profile
						</a>
						{{-- <a href="#" class="dropdown-item">
							<i class="ph-currency-circle-dollar me-2"></i>
							My subscription
						</a>
						<a href="#" class="dropdown-item">
							<i class="ph-shopping-cart me-2"></i>
							My orders
						</a>
						<a href="#" class="dropdown-item">
							<i class="ph-envelope-open me-2"></i>
							My inbox
							<span class="badge bg-primary rounded-pill ms-auto">26</span>
						</a>
						<div class="dropdown-divider"></div>
						<a href="#" class="dropdown-item">
							<i class="ph-gear me-2"></i>
							Account settings
						</a> --}}
						<a href="{{route('logout')}}" class="dropdown-item">
							<i class="ph-sign-out me-2"></i>
							Logout
						</a>
					</div>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->



<!-- Navigation -->		
	<hr style="margin: 0;">
	<div class="navbar navbar-dark px-lg-0" style="background-color: #555;">
		<div class="container-fluid container-boxed position-relative">
			<div class="flex-fill overflow-auto overflow-lg-visible scrollbar-hidden">
				<ul class="nav gap-1 flex-nowrap flex-lg-wrap">
					<li class="nav-item">
						<a href="{{route('dashboard')}}" class="navbar-nav-link rounded active">
							<i class="ph-house me-2"></i>
							Home
						</a>
					</li>



					{{-- <li class="nav-item">
						<a href="#" class="navbar-nav-link dropdown-toggle rounded" data-bs-toggle="dropdown">
							<i class="ph-layout me-2"></i>
							Page
						</a>

						<div class="dropdown-menu dropdown-mega-menu p-3">
							<div class="row">
								<div class="col-lg-4">
									<div class="fw-bold border-bottom pb-2 mb-2">Navbars</div>
									<div class="mb-3 mb-lg-0">
										<a href="layout_navbar_fixed.html" class="dropdown-item rounded">Fixed navbar</a>
										<a href="layout_navbar_hideable.html" class="dropdown-item rounded">Hideable navbar</a>
										<a href="layout_navbar_sticky.html" class="dropdown-item rounded">Sticky navbar</a>
										<a href="layout_fixed_footer.html" class="dropdown-item rounded">Fixed footer</a>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="fw-bold border-bottom pb-2 mb-2">Sidebars</div>
									<div class="mb-3 mb-lg-0">
										<a href="layout_2_sidebars_1_side.html" class="dropdown-item rounded">2 sidebars on 1 side</a>
										<a href="layout_2_sidebars_2_sides.html" class="dropdown-item rounded">2 sidebars on 2 sides</a>
										<a href="layout_3_sidebars.html" class="dropdown-item rounded">3 sidebars</a>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="fw-bold border-bottom pb-2 mb-2">Sections</div>
									<div class="mb-3 mb-lg-0">
										<a href="layout_no_header.html" class="dropdown-item rounded">No header</a>
										<a href="layout_no_footer.html" class="dropdown-item rounded">No footer</a>
										<a href="layout_boxed_page.html" class="dropdown-item rounded">Boxed page</a>
										<a href="layout_boxed_content.html" class="dropdown-item rounded">Boxed content</a>
									</div>
								</div>
							</div>
						</div>
					</li>

					<li class="nav-item">
						<a href="#" class="navbar-nav-link dropdown-toggle rounded" data-bs-toggle="dropdown">
							<i class="ph-columns me-2"></i>
							Sidebars
						</a>

						<div class="dropdown-menu dropdown-mega-menu p-3">
							<div class="row">
								<div class="col-lg-3">
									<div class="fw-bold border-bottom pb-2 mb-2">Main</div>
									<div class="mb-3 mb-lg-0">
										<a href="sidebar_default_resizable.html" class="dropdown-item rounded">Resizable</a>
										<a href="sidebar_default_resized.html" class="dropdown-item rounded">Resized</a>
										<a href="sidebar_default_hideable.html" class="dropdown-item rounded">Hideable</a>
										<a href="sidebar_default_hidden.html" class="dropdown-item rounded">Hidden</a>
										<a href="sidebar_default_stretched.html" class="dropdown-item rounded">Stretched</a>
										<a href="sidebar_default_color_dark.html" class="dropdown-item rounded">Dark color</a>
									</div>
								</div>
								<div class="col-lg-3">
									<div class="fw-bold border-bottom pb-2 mb-2">Secondary</div>
									<div class="mb-3 mb-lg-0">
										<a href="sidebar_secondary_hideable.html" class="dropdown-item rounded">Hideable</a>
										<a href="sidebar_secondary_hidden.html" class="dropdown-item rounded">Hidden</a>
										<a href="sidebar_secondary_stretched.html" class="dropdown-item rounded">Stretched</a>
										<a href="sidebar_secondary_color_dark.html" class="dropdown-item rounded">Dark color</a>
									</div>
								</div>
								<div class="col-lg-3">
									<div class="fw-bold border-bottom pb-2 mb-2">Right</div>
									<div class="mb-3 mb-lg-0">
										<a href="sidebar_right_hideable.html" class="dropdown-item rounded">Hideable</a>
										<a href="sidebar_right_hidden.html" class="dropdown-item rounded">Hidden</a>
										<a href="sidebar_right_stretched.html" class="dropdown-item rounded">Stretched</a>
										<a href="sidebar_right_color_dark.html" class="dropdown-item rounded">Dark color</a>
									</div>
								</div>
								<div class="col-lg-3">
									<div class="fw-bold border-bottom pb-2 mb-2">Other</div>
									<div class="mb-3 mb-lg-0">
										<a href="sidebar_components.html" class="dropdown-item rounded">Sidebar components</a>
									</div>
								</div>
							</div>
						</div>
					</li>

					<li class="nav-item">
						<a href="#" class="navbar-nav-link dropdown-toggle rounded" data-bs-toggle="dropdown">
							<i class="ph-rows me-2"></i>
							Navbars
						</a>

						<div class="dropdown-menu dropdown-mega-menu p-3">
							<div class="row">
								<div class="col-lg-3">
									<div class="fw-bold border-bottom pb-2 mb-2">Single</div>
									<div class="mb-3 mb-lg-0">
										<a href="navbar_single_top_static.html" class="dropdown-item rounded">Top static</a>
										<a href="navbar_single_top_fixed.html" class="dropdown-item rounded">Top fixed</a>
										<a href="navbar_single_bottom_static.html" class="dropdown-item rounded">Bottom static</a>
										<a href="navbar_single_bottom_fixed.html" class="dropdown-item rounded">Bottom fixed</a>
									</div>
								</div>
								<div class="col-lg-3">
									<div class="fw-bold border-bottom pb-2 mb-2">Multiple</div>
									<div class="mb-3 mb-lg-0">
										<a href="navbar_multiple_top_static.html" class="dropdown-item rounded">Top static</a>
										<a href="navbar_multiple_top_fixed.html" class="dropdown-item rounded">Top fixed</a>
										<a href="navbar_multiple_bottom_static.html" class="dropdown-item rounded">Bottom static</a>
										<a href="navbar_multiple_bottom_fixed.html" class="dropdown-item rounded">Bottom fixed</a>
										<a href="navbar_multiple_top_bottom_fixed.html" class="dropdown-item rounded">Top and bottom fixed</a>
										<a href="navbar_multiple_secondary_sticky.html" class="dropdown-item rounded">Secondary sticky</a>
									</div>
								</div>
								<div class="col-lg-3">
									<div class="fw-bold border-bottom pb-2 mb-2">Content</div>
									<div class="mb-3 mb-lg-0">
										<a href="navbar_component_single.html" class="dropdown-item rounded">Single</a>
										<a href="navbar_component_multiple.html" class="dropdown-item rounded">Multiple</a>
									</div>
								</div>
								<div class="col-lg-3">
									<div class="fw-bold border-bottom pb-2 mb-2">Other</div>
									<div class="mb-3 mb-lg-0">
										<a href="navbar_colors.html" class="dropdown-item rounded">Color options</a>
										<a href="navbar_sizes.html" class="dropdown-item rounded">Sizing options</a>
										<a href="navbar_components.html" class="dropdown-item rounded">Navbar components</a>
									</div>
								</div>
							</div>
						</div>
					</li>

					<li class="nav-item">
						<a href="#" class="navbar-nav-link dropdown-toggle rounded" data-bs-toggle="dropdown">
							<i class="ph-list me-2"></i>
							Navigation
						</a>

						<div class="dropdown-menu dropdown-mega-menu p-3">
							<div class="row">
								<div class="col-lg-6">
									<div class="fw-bold border-bottom pb-2 mb-2">Vertical</div>
									<div class="mb-3 mb-lg-0">
										<a href="navigation_vertical_styles.html" class="dropdown-item rounded">Navigation styles</a>
										<a href="navigation_vertical_collapsible.html" class="dropdown-item rounded">Collapsible menu</a>
										<a href="navigation_vertical_accordion.html" class="dropdown-item rounded">Accordion menu</a>
										<a href="navigation_vertical_bordered.html" class="dropdown-item rounded">Bordered navigation</a>
										<a href="navigation_vertical_right_icons.html" class="dropdown-item rounded">Right icons</a>
										<a href="navigation_vertical_badges.html" class="dropdown-item rounded">Badges</a>
										<a href="navigation_vertical_disabled.html" class="dropdown-item rounded">Disabled items</a>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="fw-bold border-bottom pb-2 mb-2">Horizontal</div>
									<div class="mb-3 mb-lg-0">
										<a href="navigation_horizontal_styles.html" class="dropdown-item rounded">Navigation styles</a>
										<a href="navigation_horizontal_elements.html" class="dropdown-item rounded">Navigation elements</a>
										<a href="navigation_horizontal_tabs.html" class="dropdown-item rounded">Tabbed navigation</a>
										<a href="navigation_horizontal_disabled.html" class="dropdown-item rounded">Disabled items</a>
										<a href="navigation_horizontal_mega.html" class="dropdown-item rounded">Mega menu</a>
									</div>
								</div>
							</div>
						</div>
					</li> --}}


					@if (hasPermission('boppstock.items.view') || hasPermission('boppstock.categories.view') )						
					<li class="nav-item nav-item-dropdown-lg dropdown">
						<a href="#" class="navbar-nav-link dropdown-toggle rounded" data-bs-toggle="dropdown">
							<i class="ph-layout me-2"></i>
							Bopp Stock
						</a>

						<div class="dropdown-menu dropdown-menu-end">
							@if (hasPermission('boppstock.items.view'))																			
							<a href="{{route('boppstock.items.view')}}" class="dropdown-item rounded">Item List</a>							
							@endif

							@if (hasPermission('boppstock.categories.view'))																			
							<a href="{{route('bopp-stock.categories.view')}}" class="dropdown-item rounded">Category List</a>
							@endif
						</div>
					</li>
					@endif



					@if (hasPermission('non-wovenfabricstock.items.view') || hasPermission('non-wovenfabricstock.categories.view') )						
					<li class="nav-item nav-item-dropdown-lg dropdown">
						<a href="#" class="navbar-nav-link dropdown-toggle rounded" data-bs-toggle="dropdown">
							<i class="ph-layout me-2"></i>
							Non Woven Fabric Stock
						</a>

						<div class="dropdown-menu dropdown-menu-end">	
							@if (hasPermission('non-wovenfabricstock.items.view') )													
							<a href="{{route('non-wovenfabricstock.items.view')}}" class="dropdown-item rounded">Non Item Code List</a>
							@endif
							@if (hasPermission('non-wovenfabricstock.categories.view'))								
							<a href="{{route('non-wovenfabricstock.categories.view')}}" class="dropdown-item rounded">Non Category List</a>
							@endif
						</div>
					</li>
					@endif	
					
					
					<li class="nav-item nav-item-dropdown-lg dropdown">
						<a href="#" class="navbar-nav-link dropdown-toggle rounded" data-bs-toggle="dropdown">
							<i class="ph-layout me-2"></i>
							Roles and Users
						</a>

						<div class="dropdown-menu dropdown-menu-end">													
							<a href="{{route('admin.role')}}" class="dropdown-item rounded">Roles </a>							
							{{-- <a href="{{route('admin.mainUsers')}}" class="dropdown-item rounded">Users </a>							 --}}
						</div>
					</li>

					

					{{-- <li class="nav-item nav-item-dropdown-lg dropdown">
						<a href="#" class="navbar-nav-link dropdown-toggle rounded" data-bs-toggle="dropdown">
							<i class="ph-layout me-2"></i>
							Module
						</a>

						<div class="dropdown-menu dropdown-menu-end">													
							<a href="#" class="dropdown-item rounded">Link1 </a>
							<a href="#" class="dropdown-item rounded">Link2</a>
							<a href="#" class="dropdown-item rounded">Link3</a>
							<a href="#" class="dropdown-item rounded">Link4</a>
						</div>
					</li>

					<li class="nav-item nav-item-dropdown-lg dropdown">
						<a href="#" class="navbar-nav-link dropdown-toggle rounded" data-bs-toggle="dropdown">
							<i class="ph-layout me-2"></i>
							Module 2
						</a>

						<div class="dropdown-menu dropdown-menu-end">													
							<a href="#" class="dropdown-item rounded">Link1 </a>
							<a href="#" class="dropdown-item rounded">Link2</a>
							<a href="#" class="dropdown-item rounded">Link3</a>
							<a href="#" class="dropdown-item rounded">Link4</a>
						</div>
					</li> --}}
					{{--<li class="nav-item nav-item-dropdown-lg dropdown">
						<a href="#" class="navbar-nav-link dropdown-toggle rounded" data-bs-toggle="dropdown">
							<i class="ph-arrows-clockwise me-2"></i>
							Switch
						</a>

						<div class="dropdown-menu dropdown-menu-end">
							<div class="dropdown-submenu dropdown-submenu-start">
								<a href="#" class="dropdown-item dropdown-toggle">
									<i class="ph-layout me-2"></i>
									Layouts
								</a>
								<div class="dropdown-menu">
									<a href="../../layout_1/full/index.html" class="dropdown-item">Default layout</a>
									<a href="../../layout_2/full/index.html" class="dropdown-item">Layout 2</a>
									<a href="../../layout_3/full/index.html" class="dropdown-item">Layout 3</a>
									<a href="../../layout_4/full/index.html" class="dropdown-item">Layout 4</a>
									<a href="index.html" class="dropdown-item active">Layout 5</a>
									<a href="../../layout_6/full/index.html" class="dropdown-item">Layout 6</a>
									<a href="../../layout_7/full/index.html" class="dropdown-item disabled">
										Layout 7
										<span class="opacity-75 fs-sm ms-auto">Coming soon</span>
									</a>
								</div>
							</div>
							<div class="dropdown-submenu dropdown-submenu-start">
								<a href="#" class="dropdown-item dropdown-toggle">
									<i class="ph-swatches me-2"></i>
									Themes
								</a>
								<div class="dropdown-menu">
									<a href="index.html" class="dropdown-item active">Default</a>
									<a href="../../../LTR/material/full/index.html" class="dropdown-item disabled">
										Material
										<span class="opacity-75 fs-sm ms-auto">Coming soon</span>
									</a>
									<a href="../../../LTR/clean/full/index.html" class="dropdown-item disabled">
										Clean
										<span class="opacity-75 fs-sm ms-auto">Coming soon</span>
									</a>
								</div>
							</div>
						</div>
					</li> --}}
				</ul>
			</div>

			{{-- <div class="fab-menu fab-menu-absolute fab-menu-top fab-menu-top-end d-none d-lg-block" data-fab-toggle="click" data-fab-state="closed">
					<button type="button" class="fab-menu-btn btn btn-primary rounded-pill">
						<div class="m-1">
							<i class="fab-icon-open ph-plus"></i>
							<i class="fab-icon-close ph-x"></i>
						</div>
					</button>

					<ul class="fab-menu-inner">
						<li>
							<div data-fab-label="Compose email">
								<a href="#" class="btn btn-light shadow rounded-pill btn-icon">
									<i class="ph-pencil m-1"></i>
								</a>
							</div>
						</li>
						<li>
							<div data-fab-label="Conversations">
								<a href="#" class="btn btn-light shadow rounded-pill btn-icon">
									<i class="ph-chats m-1"></i>
								</a>
								<span class="badge bg-dark position-absolute top-0 end-0 translate-middle-top rounded-pill mt-1 me-1">5</span>
							</div>
						</li>
						<li>
							<div data-fab-label="Chat with Jack">
								<a href="#" class="btn btn-link btn-icon status-indicator-container rounded-pill p-0 ms-1">
									<img src="../../../assets/images/demo/users/face1.jpg" class="img-fluid rounded-pill" alt="">
									<span class="status-indicator bg-danger"></span>
									<span class="badge bg-dark position-absolute top-0 end-0 translate-middle-top rounded-pill mt-1 me-1">2</span>
								</a>
							</div>
						</li>
					</ul>
			</div> --}}
		</div>
	</div>
<!-- /navigation -->

