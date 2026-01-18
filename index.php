<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>SalesPilot — Modern Inventory & POS System</title>
		<?php include 'include/responsive.php'; ?>
		<link rel="stylesheet" href="asset/css/style.css">
		<style>
			:root {
				--primary: #667eea;
				--primary-dark: #5568d3;
				--secondary: #764ba2;
				--accent: #f093fb;
				--dark: #1a202c;
				--muted: #718096;
				--light: #f7fafc;
				--success: #48bb78;
				--warning: #ed8936;
			}
			
			* {
				margin: 0;
				padding: 0;
				box-sizing: border-box;
			}
			
			body {
				font-family: 'Inter', system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
				margin: 0;
				background: #fff;
				color: var(--dark);
				line-height: 1.6;
			}
			
			/* Navigation */
			.navbar {
				position: fixed;
				top: 0;
				left: 0;
				right: 0;
				background: rgba(255, 255, 255, 0.95);
				backdrop-filter: blur(10px);
				box-shadow: 0 2px 20px rgba(0, 0, 0, 0.05);
				z-index: 1000;
				transition: all 0.3s ease;
			}
			
			.navbar.scrolled {
				box-shadow: 0 2px 30px rgba(0, 0, 0, 0.1);
			}
			
			.nav-container {
				max-width: 1200px;
				margin: 0 auto;
				padding: 1rem 2rem;
				display: flex;
				justify-content: space-between;
				align-items: center;
			}
			
			.logo {
				font-size: 1.5rem;
				font-weight: 700;
				background: linear-gradient(135deg, var(--primary), var(--secondary));
				-webkit-background-clip: text;
				-webkit-text-fill-color: transparent;
				background-clip: text;
			}
			
			.nav-links {
				display: flex;
				gap: 2rem;
				list-style: none;
				align-items: center;
			}
			
			.nav-links a {
				text-decoration: none;
				color: var(--dark);
				font-weight: 500;
				transition: color 0.3s;
				position: relative;
			}
			
			.nav-links a:hover {
				color: var(--primary);
			}
			
			.nav-links a::after {
				content: '';
				position: absolute;
				bottom: -5px;
				left: 0;
				width: 0;
				height: 2px;
				background: var(--primary);
				transition: width 0.3s;
			}
			
			.nav-links a:hover::after {
				width: 100%;
			}
			
			.mobile-menu-btn {
				display: none;
				background: none;
				border: none;
				font-size: 1.5rem;
				cursor: pointer;
				color: var(--dark);
			}
			
			/* Hero Section */
			.hero {
				background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
				color: #fff;
				padding: 140px 2rem 100px;
				text-align: center;
				position: relative;
				overflow: hidden;
			}
			
			.hero::before {
				content: '';
				position: absolute;
				top: 0;
				left: 0;
				right: 0;
				bottom: 0;
				background: url('data:image/svg+xml,<svg width="100" height="100" xmlns="http://www.w3.org/2000/svg"><defs><pattern id="grid" width="40" height="40" patternUnits="userSpaceOnUse"><path d="M 40 0 L 0 0 0 40" fill="none" stroke="rgba(255,255,255,0.1)" stroke-width="1"/></pattern></defs><rect width="100" height="100" fill="url(%23grid)"/></svg>');
				opacity: 0.3;
			}
			
			.hero-content {
				max-width: 900px;
				margin: 0 auto;
				position: relative;
				z-index: 1;
			}
			
			.hero h1 {
				font-size: 3.5rem;
				margin: 0 0 1.5rem;
				font-weight: 800;
				line-height: 1.2;
				animation: fadeInUp 0.8s ease;
			}
			
			.hero p {
				font-size: 1.25rem;
				opacity: 0.95;
				margin: 0 0 2.5rem;
				max-width: 700px;
				margin-left: auto;
				margin-right: auto;
				animation: fadeInUp 0.8s ease 0.2s both;
			}
			
			.cta {
				display: inline-flex;
				gap: 1rem;
				animation: fadeInUp 0.8s ease 0.4s both;
			}
			
			.btn {
				display: inline-block;
				padding: 14px 32px;
				border-radius: 50px;
				text-decoration: none;
				font-weight: 600;
				font-size: 1rem;
				transition: all 0.3s ease;
				cursor: pointer;
			}
			
			.btn-primary {
				background: #fff;
				color: var(--primary);
				box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
			}
			
			.btn-primary:hover {
				transform: translateY(-2px);
				box-shadow: 0 6px 25px rgba(0, 0, 0, 0.3);
			}
			
			.btn-outline {
				background: transparent;
				color: #fff;
				border: 2px solid rgba(255, 255, 255, 0.5);
			}
			
			.btn-outline:hover {
				background: rgba(255, 255, 255, 0.1);
				border-color: #fff;
			}
			
			/* Container */
			.container {
				max-width: 1200px;
				margin: 0 auto;
				padding: 4rem 2rem;
			}
			
			.section-header {
				text-align: center;
				margin-bottom: 3rem;
			}
			
			.section-header h2 {
				font-size: 2.5rem;
				font-weight: 700;
				margin-bottom: 1rem;
				color: var(--dark);
			}
			
			.section-header p {
				font-size: 1.1rem;
				color: var(--muted);
				max-width: 600px;
				margin: 0 auto;
			}
			
			/* Features Section */
			.features {
				display: grid;
				grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
				gap: 2rem;
			}
			
			.feature {
				background: #fff;
				padding: 2.5rem;
				border-radius: 16px;
				box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
				transition: all 0.3s ease;
				border: 1px solid rgba(0, 0, 0, 0.05);
			}
			
			.feature:hover {
				transform: translateY(-10px);
				box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
			}
			
			.feature-icon {
				width: 60px;
				height: 60px;
				background: linear-gradient(135deg, var(--primary), var(--secondary));
				border-radius: 12px;
				display: flex;
				align-items: center;
				justify-content: center;
				font-size: 1.8rem;
				margin-bottom: 1.5rem;
				color: #fff;
			}
			
			.feature h3 {
				font-size: 1.4rem;
				margin-bottom: 1rem;
				color: var(--dark);
			}
			
			.feature p {
				color: var(--muted);
				line-height: 1.6;
			}
			
			/* Stats Section */
			.stats {
				background: linear-gradient(135deg, var(--primary), var(--secondary));
				color: #fff;
				padding: 4rem 2rem;
				margin: 4rem 0;
			}
			
			.stats-grid {
				display: grid;
				grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
				gap: 3rem;
				max-width: 1200px;
				margin: 0 auto;
				text-align: center;
			}
			
			.stat h3 {
				font-size: 3rem;
				font-weight: 700;
				margin-bottom: 0.5rem;
			}
			
			.stat p {
				font-size: 1.1rem;
				opacity: 0.9;
			}
			
			/* Pricing Section */
			.pricing {
				background: var(--light);
			}
			
			.pricing-cards {
				display: grid;
				grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
				gap: 2rem;
				max-width: 1000px;
				margin: 0 auto;
			}
			
			.pricing-card {
				background: #fff;
				border-radius: 16px;
				padding: 2.5rem;
				box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
				transition: all 0.3s ease;
				border: 2px solid transparent;
			}
			
			.pricing-card.featured {
				border-color: var(--primary);
				transform: scale(1.05);
			}
			
			.pricing-card:hover {
				transform: translateY(-10px) scale(1.02);
				box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
			}
			
			.pricing-card h3 {
				font-size: 1.5rem;
				margin-bottom: 1rem;
				color: var(--dark);
			}
			
			.price {
				font-size: 3rem;
				font-weight: 700;
				color: var(--primary);
				margin-bottom: 1.5rem;
			}
			
			.price span {
				font-size: 1.2rem;
				color: var(--muted);
			}
			
			.features-list {
				list-style: none;
				margin-bottom: 2rem;
			}
			
			.features-list li {
				padding: 0.75rem 0;
				color: var(--muted);
				border-bottom: 1px solid rgba(0, 0, 0, 0.05);
			}
			
			.features-list li::before {
				content: '✓';
				color: var(--success);
				font-weight: 700;
				margin-right: 0.75rem;
			}
			
			/* About Section */
			.about-content {
				display: grid;
				grid-template-columns: 1fr 1fr;
				gap: 4rem;
				align-items: center;
			}
			
			.about-text h2 {
				font-size: 2.5rem;
				margin-bottom: 1.5rem;
				color: var(--dark);
			}
			
			.about-text p {
				font-size: 1.1rem;
				color: var(--muted);
				margin-bottom: 1.5rem;
				line-height: 1.8;
			}
			
			.about-image {
				background: linear-gradient(135deg, var(--primary), var(--secondary));
				border-radius: 16px;
				height: 400px;
				display: flex;
				align-items: center;
				justify-content: center;
				font-size: 6rem;
				color: rgba(255, 255, 255, 0.3);
			}
			
			/* Contact Section */
			.contact {
				background: var(--light);
			}
			
			.contact-grid {
				display: grid;
				grid-template-columns: 1fr 1fr;
				gap: 4rem;
			}
			
			.contact-info {
				display: flex;
				flex-direction: column;
				gap: 2rem;
			}
			
			.contact-item {
				display: flex;
				gap: 1.5rem;
				align-items: start;
			}
			
			.contact-icon {
				width: 50px;
				height: 50px;
				background: linear-gradient(135deg, var(--primary), var(--secondary));
				border-radius: 12px;
				display: flex;
				align-items: center;
				justify-content: center;
				color: #fff;
				font-size: 1.5rem;
				flex-shrink: 0;
			}
			
			.contact-item h3 {
				font-size: 1.2rem;
				margin-bottom: 0.5rem;
			}
			
			.contact-item p, .contact-item a {
				color: var(--muted);
				text-decoration: none;
			}
			
			.contact-item a:hover {
				color: var(--primary);
			}
			
			.contact-form {
				background: #fff;
				padding: 2.5rem;
				border-radius: 16px;
				box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
			}
			
			.form-group {
				margin-bottom: 1.5rem;
			}
			
			.form-group label {
				display: block;
				margin-bottom: 0.5rem;
				font-weight: 600;
				color: var(--dark);
			}
			
			.form-group input,
			.form-group textarea {
				width: 100%;
				padding: 12px 16px;
				border: 2px solid rgba(0, 0, 0, 0.1);
				border-radius: 8px;
				font-size: 1rem;
				font-family: inherit;
				transition: border-color 0.3s;
			}
			
			.form-group input:focus,
			.form-group textarea:focus {
				outline: none;
				border-color: var(--primary);
			}
			
			.form-group textarea {
				resize: vertical;
				min-height: 120px;
			}
			
			.submit-btn {
				background: linear-gradient(135deg, var(--primary), var(--secondary));
				color: #fff;
				border: none;
				width: 100%;
			}
			
			.submit-btn:hover {
				transform: translateY(-2px);
				box-shadow: 0 6px 25px rgba(102, 126, 234, 0.4);
			}
			
			/* Footer */
			.footer {
				background: var(--dark);
				color: #fff;
				padding: 3rem 2rem 2rem;
			}
			
			.footer-content {
				max-width: 1200px;
				margin: 0 auto;
				display: grid;
				grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
				gap: 3rem;
				margin-bottom: 2rem;
			}
			
			.footer-section h3 {
				margin-bottom: 1.5rem;
				font-size: 1.3rem;
			}
			
			.footer-links {
				list-style: none;
			}
			
			.footer-links li {
				margin-bottom: 0.75rem;
			}
			
			.footer-links a {
				color: rgba(255, 255, 255, 0.7);
				text-decoration: none;
				transition: color 0.3s;
			}
			
			.footer-links a:hover {
				color: #fff;
			}
			
			.social-links {
				display: flex;
				gap: 1rem;
				margin-top: 1rem;
			}
			
			.social-links a {
				width: 40px;
				height: 40px;
				background: linear-gradient(135deg, var(--primary), var(--secondary));
				border-radius: 50%;
				display: flex;
				align-items: center;
				justify-content: center;
				color: #fff;
				text-decoration: none;
				transition: all 0.3s;
				font-weight: 600;
				font-size: 0.85rem;
				box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
				border: 1px solid rgba(255, 255, 255, 0.3);
			}
			
			.social-links a:hover {
				background: linear-gradient(135deg, var(--secondary), var(--primary));
				transform: translateY(-3px) scale(1.1);
				box-shadow: 0 6px 20px rgba(102, 126, 234, 0.5);
			}
			
			.footer-bottom {
				text-align: center;
				padding-top: 2rem;
				border-top: 1px solid rgba(255, 255, 255, 0.1);
				color: rgba(255, 255, 255, 0.6);
			}
			
			/* Animations */
			@keyframes fadeInUp {
				from {
					opacity: 0;
					transform: translateY(30px);
				}
				to {
					opacity: 1;
					transform: translateY(0);
				}
			}
			
			/* Responsive */
			@media (max-width: 768px) {
				.nav-links {
					display: none;
					position: absolute;
					top: 100%;
					left: 0;
					right: 0;
					background: #fff;
					flex-direction: column;
					padding: 2rem;
					box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
				}
				
				.nav-links.active {
					display: flex;
				}
				
				.mobile-menu-btn {
					display: block;
				}
				
				.hero h1 {
					font-size: 2.5rem;
				}
				
				.hero p {
					font-size: 1.1rem;
				}
				
				.cta {
					flex-direction: column;
					width: 100%;
				}
				
				.btn {
					width: 100%;
					text-align: center;
				}
				
				.about-content,
				.contact-grid {
					grid-template-columns: 1fr;
				}
				
				.stats-grid {
					gap: 2rem;
				}
				
				.stat h3 {
					font-size: 2rem;
				}
				
				.pricing-card.featured {
					transform: none;
				}
			}
		</style>
	</head>
	<body>
		<!-- Navigation -->
		<nav class="navbar" id="navbar">
			<div class="nav-container">
				<div class="logo">SalesPilot</div>
				<button class="mobile-menu-btn" onclick="toggleMenu()">☰</button>
				<ul class="nav-links" id="navLinks">
					<li><a href="#home">Home</a></li>
					<li><a href="#features">Features</a></li>
					<li><a href="#pricing">Pricing</a></li>
					<li><a href="#about">About</a></li>
					<li><a href="#contact">Contact</a></li>
					<li><a href="log_in_manager.php" class="btn btn-primary" style="color: var(--primary); padding: 8px 20px;">Login</a></li>
				</ul>
			</div>
		</nav>

		<!-- Hero Section -->
		<section class="hero" id="home">
			<div class="hero-content">
				<h1>Transform Your Business with Modern Inventory Management</h1>
				<p>SalesPilot is the all-in-one solution for managing inventory, sales, customers, and analytics. Built for modern businesses that demand efficiency and growth.</p>
				<div class="cta">
					<a class="btn btn-primary" href="sign_up.php">Get Started Free</a>
					<a class="btn btn-outline" href="#features">Learn More</a>
				</div>
			</div>
		</section>

		<!-- Stats Section -->
		<section class="stats">
			<div class="stats-grid">
				<div class="stat">
					<h3>5,000+</h3>
					<p>Active Businesses</p>
				</div>
				<div class="stat">
					<h3>99.9%</h3>
					<p>Uptime Guarantee</p>
				</div>
				<div class="stat">
					<h3>24/7</h3>
					<p>Customer Support</p>
				</div>
				<div class="stat">
					<h3>50M+</h3>
					<p>Transactions Processed</p>
				</div>
			</div>
		</section>

		<!-- Features Section -->
		<section class="container" id="features">
			<div class="section-header">
				<h2>Powerful Features for Growing Businesses</h2>
				<p>Everything you need to manage and grow your retail business efficiently</p>
			</div>
			<div class="features">
				<div class="feature">
					<div class="feature-icon">📦</div>
					<h3>Inventory Management</h3>
					<p>Track stock levels in real-time, manage variants, SKUs, barcodes, and receive low-stock alerts. Never run out of your best-selling products again.</p>
				</div>
				
				<div class="feature">
					<div class="feature-icon">👥</div>
					<h3>Customer Relationship Management</h3>
					<p>Build lasting relationships with integrated CRM tools. Store customer data, track purchase history, and create targeted marketing campaigns.</p>
				</div>
				<div class="feature">
					<div class="feature-icon">📊</div>
					<h3>Advanced Analytics</h3>
					<p>Make data-driven decisions with comprehensive reports on sales, inventory, staff performance, and customer behavior. Visualize trends with beautiful charts.</p>
				</div>
				<div class="feature">
					<div class="feature-icon">🔄</div>
					<h3>Multi-Location Support</h3>
					<p>Manage multiple stores from a single dashboard. Transfer inventory between locations and get unified reports across all your business outlets.</p>
				</div>
				<div class="feature">
					<div class="feature-icon">🔐</div>
					<h3>Secure & Reliable</h3>
					<p>Bank-level security with encrypted data, automated backups, and role-based access control to keep your business information safe and secure.</p>
				</div>
				<div class="feature">
					<div class="feature-icon">💳</div>
					<h3> Point of Sale (POS)<sub style="color: red; font-size: 0.6em;">(In view)</sub></h3>
					<p>Lightning-fast checkout experience with support for multiple payment methods, receipt printing, and seamless cart management for busy retail environments.</p>
				</div>
			</div>
		</section>

		<!-- Pricing Section -->
		<section class="pricing" id="pricing">
			<div class="container">
				<div class="section-header">
					<h2>Simple, Transparent Pricing</h2>
					<p>Choose the plan that's right for your business. No hidden fees.</p>
				</div>
				<div class="pricing-cards">
					<div class="pricing-card">
						<h3>Basic</h3>
						<div class="price">₦5,000<span>/month</span></div>
						<ul class="features-list">
							<li>Up to 500 products</li>
							<li>2 Users account</li>
							<li>Basic reports</li>
							<li>Email support</li>
							<li>Single Manager Support</li>
						</ul>
						<a href="sign_up.php" class="btn btn-outline" style="width: 100%; text-align: center;">Choose Plan</a>
					</div>
					<div class="pricing-card featured">
						<h3>Standard</h3>
						<div class="price">₦10,000<span>/month</span></div>
						<ul class="features-list">
							<li>Unlimited products</li>
							<li>4 User accounts</li>
							<li>Priority support</li>
							<li>Multi-location(2-branches)</li>
							<li>Custom receipts</li>
						</ul>
						<a href="sign_up.php" class="btn btn-primary" style="width: 100%; text-align: center;">Choose Plan</a>
					</div>
					<div class="pricing-card">
						<h3>Premium</h3>
						<div class="price">₦20,000<span>/month</span></div>
						<ul class="features-list">
							<li>Everything in Standard</li>
							<li>Up to 10 users</li>
							<li>Multi-location(3-branches)</li>
							<li>Dedicated support</li>
							<li>Supports up to 3 manager accounts</li>
							<li>Advanced analytics & Reporting</li>
						</ul>
						<a href="sign_up.php" class="btn btn-outline" style="width: 100%; text-align: center;">Choose Plan</a>
					</div>
				</div>
			</div>
		</section>

		<!-- About Section -->
		<section class="container" id="about">
			<div class="about-content">
				<div class="about-text">
					<h2>About SalesPilot</h2>
					<p>SalesPilot was founded with a simple mission: to empower small and medium-sized businesses with enterprise-grade inventory and point-of-sale solutions that are both powerful and easy to use.</p>
					<p>We understand the challenges of running a retail business. That's why we've built a platform that combines sophisticated inventory management, seamless POS operations, and insightful analytics in one intuitive interface.</p>
					<p>Our team is dedicated to helping businesses grow through technology. With continuous updates, responsive support, and a commitment to your success, SalesPilot is more than just software—it's your business partner.</p>
					<a href="sign_up.php" class="btn btn-primary">Start Your Free Trial</a>
				</div>
				<div class="about-image">
					📈
				</div>
			</div>
		</section>

		<!-- Contact Section -->
		<section class="contact" id="contact">
			<div class="container">
				<div class="section-header">
					<h2>Get In Touch</h2>
					<p>Have questions? We'd love to hear from you. Send us a message and we'll respond as soon as possible.</p>
				</div>
				<div class="contact-grid">
					<div class="contact-info">
						<div class="contact-item">
							<div class="contact-icon">📧</div>
							<div>
								<h3>Email Us</h3>
								<a href="mailto:info.salespilots@gmail.com">info.salespilots@gmail.com</a><br>
								<a href="mailto:support@salespilot.com">support@salespilot.com</a>
							</div>
						</div>
						<div class="contact-item">
							<div class="contact-icon">📞</div>
							<div>
								<h3>Call Us</h3>
								<p>+234 800 123 4567</p>
								<p>Mon-Fri, 8am-6pm WAT</p>
							</div>
						</div>
						<div class="contact-item">
							<div class="contact-icon">📍</div>
							<div>
								<h3>Visit Us</h3>
								<p>123 Business District<br>Lagos, Nigeria</p>
							</div>
						</div>
						<div class="contact-item">
							<div class="contact-icon">🌐</div>
							<div>
								<h3>Follow Us</h3>
									<div class="social-links">
									<a href="#" title="Facebook">FB</a>
									<a href="#" title="Twitter">X</a>
									<a href="#" title="LinkedIn">in</a>
									<a href="#" title="Instagram">IG</a>
									</div>
							</div>
						</div>
					</div>
					<div class="contact-form">
						<form action="#" method="POST">
							<div class="form-group">
								<label for="name">Full Name</label>
								<input type="text" id="name" name="name" required>
							</div>
							<div class="form-group">
								<label for="email">Email Address</label>
								<input type="email" id="email" name="email" required>
							</div>
							<div class="form-group">
								<label for="subject">Subject</label>
								<input type="text" id="subject" name="subject" required>
							</div>
							<div class="form-group">
								<label for="message">Message</label>
								<textarea id="message" name="message" required></textarea>
							</div>
							<button type="submit" class="btn submit-btn">Send Message</button>
						</form>
					</div>
				</div>
			</div>
		</section>

		<!-- Footer -->
		<footer class="footer">
			<div class="footer-content">
				<div class="footer-section">
					<h3>SalesPilot</h3>
					<p>Empowering businesses with modern inventory and POS solutions.</p>
					<div class="social-links">
						<a href="#">f</a>
						<a href="#">𝕏</a>
						<a href="#">in</a>
						<a href="#">📷</a>
					</div>
				</div>
				<div class="footer-section">
					<h3>Product</h3>
					<ul class="footer-links">
						<li><a href="#features">Features</a></li>
						<li><a href="#pricing">Pricing</a></li>
						<li><a href="plans.php">View Plans</a></li>
						<li><a href="sign_up.php">Sign Up</a></li>
					</ul>
				</div>
				<div class="footer-section">
					<h3>Company</h3>
					<ul class="footer-links">
						<li><a href="#about">About Us</a></li>
						<li><a href="#contact">Contact</a></li>
						<li><a href="#">Careers</a></li>
						<li><a href="#">Blog</a></li>
					</ul>
				</div>
				<div class="footer-section">
					<h3>Support</h3>
					<ul class="footer-links">
						<li><a href="#">Help Center</a></li>
						<li><a href="#">Documentation</a></li>
						<li><a href="#">Privacy Policy</a></li>
						<li><a href="#">Terms of Service</a></li>
					</ul>
				</div>
			</div>
			<div class="footer-bottom">
				<p>&copy; 2026 SalesPilot. All rights reserved. Built with ❤️ for businesses everywhere.</p>
			</div>
		</footer>

		<script>
			// Navbar scroll effect
			window.addEventListener('scroll', function() {
				const navbar = document.getElementById('navbar');
				if (window.scrollY > 50) {
					navbar.classList.add('scrolled');
				} else {
					navbar.classList.remove('scrolled');
				}
			});

			// Mobile menu toggle
			function toggleMenu() {
				const navLinks = document.getElementById('navLinks');
				navLinks.classList.toggle('active');
			}

			// Smooth scrolling for anchor links
			document.querySelectorAll('a[href^="#"]').forEach(anchor => {
				anchor.addEventListener('click', function (e) {
					const href = this.getAttribute('href');
					if (href !== '#' && href !== '') {
						e.preventDefault();
						const target = document.querySelector(href);
						if (target) {
							const navHeight = document.getElementById('navbar').offsetHeight;
							const targetPosition = target.offsetTop - navHeight;
							window.scrollTo({
								top: targetPosition,
								behavior: 'smooth'
							});
							// Close mobile menu if open
							document.getElementById('navLinks').classList.remove('active');
						}
					}
				});
			});
		</script>
	</body>
</html>

