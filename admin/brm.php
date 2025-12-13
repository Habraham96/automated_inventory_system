<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>brm - SalesPilot</title>
    <link rel="stylesheet" href="../Manager/assets/vendors/feather/feather.css">
    <link rel="stylesheet" href="../Manager/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../Manager/assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../Manager/assets/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../Manager/assets/vendors/typicons/typicons.css">
    <link rel="stylesheet" href="../Manager/assets/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="../Manager/assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../Manager/assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <?php include 'layouts/sidebar_styles.php'; ?>
    <style>
      .main-panel { margin-left: 280px !important; transition: margin-left 0.2s ease !important; }
      body.sidebar-collapsed .main-panel { margin-left: 70px !important; }
      
      .page-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 2rem;
        border-radius: 10px;
        margin-bottom: 2rem;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      }
      
      .brm-tabs {
        background: white;
        border-radius: 10px;
        padding: 1rem;
        margin-bottom: 1.5rem;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      }
      
      .brm-tabs .nav-link {
        color: #6c757d;
        font-weight: 500;
        padding: 0.75rem 1.5rem;
        border: none;
        border-radius: 8px;
        transition: all 0.3s ease;
      }
      
      .brm-tabs .nav-link:hover {
        background: #f8f9fa;
        color: #0d6efd;
      }
      
      .brm-tabs .nav-link.active {
        background: #0d6efd;
        color: white;
      }
      
      .search-filter-section {
        background: white;
        padding: 1.5rem;
        border-radius: 10px;
        margin-bottom: 1.5rem;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      }
      
      .leads-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
      }
      
      .lead-card {
        background: white;
        border-radius: 10px;
        padding: 1.5rem;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
        cursor: pointer;
        border-left: 4px solid transparent;
      }
      
      .lead-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 16px rgba(0,0,0,0.15);
      }
      
      .lead-card.new { border-left-color: #0d6efd; }
      .lead-card.contacted { border-left-color: #ffc107; }
      .lead-card.qualified { border-left-color: #17a2b8; }
      .lead-card.converted { border-left-color: #198754; }
      
      .lead-header {
        display: flex;
        justify-content: space-between;
        align-items: start;
        margin-bottom: 1rem;
      }
      
      .lead-avatar {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        color: white;
        font-size: 1.2rem;
        margin-bottom: 0.75rem;
      }
      
      .lead-name {
        font-weight: 600;
        font-size: 1.1rem;
        margin-bottom: 0.25rem;
        color: #212529;
      }
      
      .lead-company {
        color: #6c757d;
        font-size: 0.9rem;
        margin-bottom: 0.75rem;
      }
      
      .lead-info {
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
        margin-bottom: 1rem;
      }
      
      .lead-info-item {
        display: flex;
        align-items: center;
        font-size: 0.9rem;
        color: #495057;
      }
      
      .lead-info-item i {
        width: 20px;
        margin-right: 0.5rem;
        color: #6c757d;
      }
      
      .lead-status {
        display: inline-block;
        padding: 0.35rem 0.75rem;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 500;
      }
      
      .status-new { background: rgba(13, 110, 253, 0.1); color: #0d6efd; }
      .status-contacted { background: rgba(255, 193, 7, 0.1); color: #ffc107; }
      .status-qualified { background: rgba(23, 162, 184, 0.1); color: #17a2b8; }
      .status-converted { background: rgba(25, 135, 84, 0.1); color: #198754; }
      
      .lead-value {
        font-weight: 700;
        font-size: 1.2rem;
        color: #198754;
        margin-top: 0.75rem;
      }
      
      .lead-actions {
        display: flex;
        gap: 0.5rem;
        margin-top: 1rem;
        padding-top: 1rem;
        border-top: 1px solid #e9ecef;
      }
      
      .lead-action-btn {
        flex: 1;
        padding: 0.5rem;
        border: none;
        background: #f8f9fa;
        border-radius: 6px;
        cursor: pointer;
        transition: all 0.2s ease;
        font-size: 0.9rem;
      }
      
      .lead-action-btn:hover {
        background: #e9ecef;
        transform: translateY(-2px);
      }
      
      .side-panel {
        position: fixed;
        top: 0;
        right: -600px;
        width: 600px;
        height: 100%;
        background: white;
        box-shadow: -4px 0 20px rgba(0,0,0,0.15);
        transition: right 0.3s ease;
        z-index: 1060;
        overflow-y: auto;
      }
      
      .side-panel.active { right: 0; }
      
      .side-panel-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.5);
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease;
        z-index: 1055;
      }
      
      .side-panel-overlay.active {
        opacity: 1;
        visibility: visible;
      }
      
      .side-panel-header {
        padding: 1.5rem;
        border-bottom: 1px solid #dee2e6;
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: #f8f9fa;
      }
      
      .side-panel-body {
        padding: 1.5rem;
      }
      
      .detail-section {
        margin-bottom: 2rem;
      }
      
      .detail-section h6 {
        font-weight: 600;
        margin-bottom: 1rem;
        color: #495057;
        text-transform: uppercase;
        font-size: 0.85rem;
        letter-spacing: 0.5px;
      }
      
      .detail-row {
        display: flex;
        padding: 0.75rem 0;
        border-bottom: 1px solid #e9ecef;
      }
      
      .detail-row:last-child { border-bottom: none; }
      
      .detail-label {
        font-weight: 600;
        color: #6c757d;
        width: 140px;
        flex-shrink: 0;
      }
      
      .detail-value {
        color: #212529;
        flex: 1;
      }
      
      .activity-timeline {
        position: relative;
        padding-left: 2rem;
      }
      
      .activity-timeline::before {
        content: '';
        position: absolute;
        left: 8px;
        top: 0;
        bottom: 0;
        width: 2px;
        background: #e9ecef;
      }
      
      .activity-item {
        position: relative;
        margin-bottom: 1.5rem;
      }
      
      .activity-icon {
        position: absolute;
        left: -2rem;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.7rem;
        background: white;
        border: 2px solid #0d6efd;
        color: #0d6efd;
      }
      
      .activity-content {
        background: #f8f9fa;
        padding: 1rem;
        border-radius: 8px;
      }
      
      .activity-title {
        font-weight: 600;
        margin-bottom: 0.25rem;
        color: #212529;
      }
      
      .activity-time {
        font-size: 0.85rem;
        color: #6c757d;
      }
      
      .add-brm-panel {
        position: fixed;
        top: 0;
        right: 0;
        width: 600px;
        height: 100vh;
        background: white;
        box-shadow: -5px 0 15px rgba(0,0,0,0.2);
        transform: translateX(100%);
        visibility: hidden;
        transition: transform 0.3s ease, visibility 0.3s ease;
        z-index: 1060;
        overflow-y: auto;
      }
      
      .add-brm-panel.show {
        transform: translateX(0);
        visibility: visible;
      }
      
      .add-brm-panel-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 1.5rem;
        position: sticky;
        top: 0;
        z-index: 10;
      }
      
      .add-brm-panel-body {
        padding: 2rem;
      }
      
      .panel-overlay-brm {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.5);
        opacity: 0;
        visibility: hidden;
        transition: opacity 0.3s ease, visibility 0.3s ease;
        z-index: 1055;
      }
      
      .panel-overlay-brm.show {
        opacity: 1;
        visibility: visible;
      }
      
      .stats-card {
        background: white;
        border-radius: 8px;
        padding: 0.9rem;
        box-shadow: 0 1px 6px rgba(0,0,0,0.08);
        text-align: center;
      }

      .stats-value {
        font-size: 1.25rem;
        font-weight: 700;
        margin-bottom: 0.25rem;
      }

      .stats-label {
        color: #6c757d;
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.6px;
      }
    </style>
  </head>
  <body class="with-welcome-text">
    <?php include 'layouts/preloader.php'; ?>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper">
        <?php include 'layouts/sidebar_content.php'; ?>
        <div class="main-panel">
          <div class="content-wrapper">
            <!-- Page Header -->
            <div class="page-header">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h3 class="mb-2"><i class="bi bi-people-fill me-2"></i>Business Relationship Management</h3>
                  <p class="mb-0">Manage leads, contacts, and customer interactions</p>
                </div>
                <button class="btn btn-light" onclick="openAddBRMPanel()">
                  <i class="bi bi-person-plus-fill me-2"></i>Add New BRM
                </button>
              </div>
            </div>
            
            <!-- brm Stats (responsive: 2 xs / 3 sm / 4 md / 6 lg+) -->
            <div class="row mb-4">
              <div class="col-6 col-sm-4 col-md-3 col-lg-2 mb-3">
                <div class="stats-card">
                  <div class="stats-value text-primary">42</div>
                  <div class="stats-label">New Leads</div>
                </div>
              </div>
              <div class="col-6 col-sm-4 col-md-3 col-lg-2 mb-3">
                <div class="stats-card">
                  <div class="stats-value" style="color: #ffc107;">28</div>
                  <div class="stats-label">Contacted</div>
                </div>
              </div>
              <div class="col-6 col-sm-4 col-md-3 col-lg-2 mb-3">
                <div class="stats-card">
                  <div class="stats-value" style="color: #17a2b8;">15</div>
                  <div class="stats-label">Qualified</div>
                </div>
              </div>
              <div class="col-6 col-sm-4 col-md-3 col-lg-2 mb-3">
                <div class="stats-card">
                  <div class="stats-value text-success">23</div>
                  <div class="stats-label">Converted</div>
                </div>
              </div>
            </div>
            
            <!-- brm Tabs -->
            <div class="brm-tabs">
              <ul class="nav nav-pills" id="brmTabs" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="all-tab" data-bs-toggle="pill" data-bs-target="#all" type="button">
                    <i class="bi bi-grid-fill me-2"></i>All Leads
                  </button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="new-tab" data-bs-toggle="pill" data-bs-target="#new" type="button">
                    <i class="bi bi-star-fill me-2"></i>New
                  </button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="contacted-tab" data-bs-toggle="pill" data-bs-target="#contacted" type="button">
                    <i class="bi bi-telephone-fill me-2"></i>Contacted
                  </button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="qualified-tab" data-bs-toggle="pill" data-bs-target="#qualified" type="button">
                    <i class="bi bi-check-circle-fill me-2"></i>Qualified
                  </button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="converted-tab" data-bs-toggle="pill" data-bs-target="#converted" type="button">
                    <i class="bi bi-trophy-fill me-2"></i>Converted
                  </button>
                </li>
              </ul>
            </div>
            
            <!-- Search & Filter Section -->
            <div class="search-filter-section">
              <div class="row g-3">
                <div class="col-md-5">
                  <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-search"></i></span>
                    <input type="text" class="form-control" id="searchInput" placeholder="Search leads by name, company, or email...">
                  </div>
                </div>
                <div class="col-md-2">
                  <select class="form-select" id="sourceFilter">
                    <option value="">All Sources</option>
                    <option value="Website">Website</option>
                    <option value="Referral">Referral</option>
                    <option value="Social Media">Social Media</option>
                    <option value="Event">Event</option>
                  </select>
                </div>
                <div class="col-md-2">
                  <select class="form-select" id="sortFilter">
                    <option value="newest">Newest First</option>
                    <option value="oldest">Oldest First</option>
                    <option value="value-high">Highest Value</option>
                    <option value="value-low">Lowest Value</option>
                  </select>
                </div>
                <div class="col-md-3">
                  <div class="d-flex gap-2">
                    <button class="btn btn-outline-primary flex-fill" onclick="exportLeads()">
                      <i class="bi bi-download me-2"></i>Export
                    </button>
                    <button class="btn btn-outline-secondary flex-fill" onclick="refreshLeads()">
                      <i class="bi bi-arrow-clockwise me-2"></i>Refresh
                    </button>
                  </div>
                </div>
              </div>
            </div>
            
            <!-- Tab Content -->
            <div class="tab-content" id="brmTabsContent">
              <div class="tab-pane fade show active" id="all" role="tabpanel">
                <div class="leads-grid" id="leadsGrid">
                  <!-- Lead Card 1 -->
                  <div class="lead-card new" onclick="showLeadDetails(1)">
                    <div class="lead-avatar" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                      AM
                    </div>
                    <div class="lead-name">Alice Martinez</div>
                    <div class="lead-company">Tech Innovations Ltd</div>
                          <span class="lead-status status-new">New Lead</span>
                          <small class="d-block mt-1 text-muted">Referral: <span class="fw-semibold">REF-ALC001</span></small>
                    <div class="lead-info">
                      <div class="lead-info-item">
                        <i class="bi bi-envelope-fill"></i>
                        <span>alice.martinez@techinnovations.com</span>
                      </div>
                      <div class="lead-info-item">
                        <i class="bi bi-telephone-fill"></i>
                        <span>+234 801 123 4567</span>
                      </div>
                      <div class="lead-info-item">
                        <i class="bi bi-tag-fill"></i>
                        <span>Website</span>
                      </div>
                    </div>
                    <div class="lead-value">₦2,500,000</div>
                    <div class="lead-actions">
                      <button class="lead-action-btn" onclick="event.stopPropagation(); contactLead(1)">
                        <i class="bi bi-telephone-fill"></i> Contact
                      </button>
                      <button class="lead-action-btn" onclick="event.stopPropagation(); updateLeadStatus(1)">
                        <i class="bi bi-arrow-right-circle-fill"></i> Move
                      </button>
                    </div>
                  </div>
                  
                  <!-- Lead Card 2 -->
                  <div class="lead-card contacted" onclick="showLeadDetails(2)">
                    <div class="lead-avatar" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                      BC
                    </div>
                    <div class="lead-name">Benjamin Clark</div>
                    <div class="lead-company">Global Solutions Inc</div>
                    <span class="lead-status status-contacted">Contacted</span>
                    <div class="lead-info">
                      <div class="lead-info-item">
                        <i class="bi bi-envelope-fill"></i>
                        <span>ben.clark@globalsolutions.com</span>
                      </div>
                      <div class="lead-info-item">
                        <i class="bi bi-telephone-fill"></i>
                        <span>+234 802 234 5678</span>
                      </div>
                      <div class="lead-info-item">
                        <i class="bi bi-tag-fill"></i>
                          <span>Referral</span>
                      </div>
                    </div>
                    <div class="lead-value">₦4,200,000</div>
                      <small class="d-block mt-1 text-muted">Referral Code: <span class="fw-semibold">REF-BEN123</span></small>
                    <div class="lead-actions">
                      <button class="lead-action-btn" onclick="event.stopPropagation(); contactLead(2)">
                        <i class="bi bi-chat-dots-fill"></i> Follow Up
                      </button>
                      <button class="lead-action-btn" onclick="event.stopPropagation(); updateLeadStatus(2)">
                        <i class="bi bi-arrow-right-circle-fill"></i> Move
                      </button>
                    </div>
                  </div>
                  
                  <!-- Lead Card 3 -->
                  <div class="lead-card qualified" onclick="showLeadDetails(3)">
                    <div class="lead-avatar" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                      CD
                    </div>
                    <div class="lead-name">Catherine Davis</div>
                    <div class="lead-company">Retail Masters Co</div>
                    <span class="lead-status status-qualified">Qualified</span>
                    <div class="lead-info">
                      <div class="lead-info-item">
                        <i class="bi bi-envelope-fill"></i>
                        <span>catherine.d@retailmasters.com</span>
                      </div>
                      <div class="lead-info-item">
                        <i class="bi bi-telephone-fill"></i>
                        <span>+234 803 345 6789</span>
                      </div>
                      <div class="lead-info-item">
                        <i class="bi bi-tag-fill"></i>
                        <span>Social Media</span>
                      </div>
                    </div>
                    <div class="lead-value">₦6,800,000</div>
                      <small class="d-block mt-1 text-muted">Referral Code: <span class="fw-semibold">-</span></small>
                    <div class="lead-actions">
                      <button class="lead-action-btn" onclick="event.stopPropagation(); contactLead(3)">
                        <i class="bi bi-calendar-check-fill"></i> Schedule
                      </button>
                      <button class="lead-action-btn" onclick="event.stopPropagation(); updateLeadStatus(3)">
                        <i class="bi bi-arrow-right-circle-fill"></i> Convert
                      </button>
                    </div>
                  </div>
                  
                  <!-- Lead Card 4 -->
                  <div class="lead-card converted" onclick="showLeadDetails(4)">
                    <div class="lead-avatar" style="background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);">
                      DE
                    </div>
                    <div class="lead-name">David Edwards</div>
                    <div class="lead-company">Enterprise Systems</div>
                    <span class="lead-status status-converted">Converted</span>
                    <div class="lead-info">
                      <div class="lead-info-item">
                        <i class="bi bi-envelope-fill"></i>
                        <span>d.edwards@enterprisesys.com</span>
                      </div>
                      <div class="lead-info-item">
                        <i class="bi bi-telephone-fill"></i>
                        <span>+234 804 456 7890</span>
                      </div>
                      <div class="lead-info-item">
                        <i class="bi bi-tag-fill"></i>
                        <span>Event</span>
                      </div>
                    </div>
                    <div class="lead-value">₦8,500,000</div>
                      <small class="d-block mt-1 text-muted">Referral Code: <span class="fw-semibold">-</span></small>
                    <div class="lead-actions">
                      <button class="lead-action-btn" onclick="event.stopPropagation(); contactLead(4)">
                        <i class="bi bi-file-text-fill"></i> View Deal
                      </button>
                      <button class="lead-action-btn" onclick="event.stopPropagation(); updateLeadStatus(4)">
                        <i class="bi bi-star-fill"></i> Archive
                      </button>
                    </div>
                  </div>
                  
                  <!-- Lead Card 5 -->
                  <div class="lead-card new" onclick="showLeadDetails(5)">
                    <div class="lead-avatar" style="background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);">
                      EF
                    </div>
                    <div class="lead-name">Emma Foster</div>
                    <div class="lead-company">Digital Marketing Pro</div>
                    <span class="lead-status status-new">New Lead</span>
                    <div class="lead-info">
                      <div class="lead-info-item">
                        <i class="bi bi-envelope-fill"></i>
                        <span>emma.foster@digitalmarketing.com</span>
                      </div>
                      <div class="lead-info-item">
                        <i class="bi bi-telephone-fill"></i>
                        <span>+234 805 567 8901</span>
                      </div>
                      <div class="lead-info-item">
                        <i class="bi bi-tag-fill"></i>
                        <span>Website</span>
                      </div>
                    </div>
                    <div class="lead-value">₦3,200,000</div>
                      <small class="d-block mt-1 text-muted">Referral Code: <span class="fw-semibold">-</span></small>
                    <div class="lead-actions">
                      <button class="lead-action-btn" onclick="event.stopPropagation(); contactLead(5)">
                        <i class="bi bi-telephone-fill"></i> Contact
                      </button>
                      <button class="lead-action-btn" onclick="event.stopPropagation(); updateLeadStatus(5)">
                        <i class="bi bi-arrow-right-circle-fill"></i> Move
                      </button>
                    </div>
                  </div>
                  
                  <!-- Lead Card 6 -->
                  <div class="lead-card contacted" onclick="showLeadDetails(6)">
                    <div class="lead-avatar" style="background: linear-gradient(135deg, #30cfd0 0%, #330867 100%);">
                      FG
                    </div>
                    <div class="lead-name">Frank Garcia</div>
                    <div class="lead-company">Wholesale Traders</div>
                    <span class="lead-status status-contacted">Contacted</span>
                    <div class="lead-info">
                      <div class="lead-info-item">
                        <i class="bi bi-envelope-fill"></i>
                        <span>frank.garcia@wholesaletraders.com</span>
                      </div>
                      <div class="lead-info-item">
                        <i class="bi bi-telephone-fill"></i>
                        <span>+234 806 678 9012</span>
                      </div>
                      <div class="lead-info-item">
                        <i class="bi bi-tag-fill"></i>
                        <span>Referral</span>
                      </div>
                    </div>
                    <div class="lead-value">₦5,100,000</div>
                    <div class="lead-actions">
                      <button class="lead-action-btn" onclick="event.stopPropagation(); contactLead(6)">
                        <i class="bi bi-chat-dots-fill"></i> Follow Up
                      </button>
                      <button class="lead-action-btn" onclick="event.stopPropagation(); updateLeadStatus(6)">
                        <i class="bi bi-arrow-right-circle-fill"></i> Move
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">© 2025 SalesPilot. All rights reserved.</span>
            </div>
          </footer>
        </div>
      </div>
    </div>
    
    <!-- Side Panel Overlay -->
    <div class="side-panel-overlay" id="sidePanelOverlay" onclick="closeSidePanel()"></div>
    
    <!-- Side Panel -->
    <div class="side-panel" id="leadDetailsPanel">
      <div class="side-panel-header">
        <h5 class="mb-0"><i class="bi bi-person-circle me-2"></i>Lead Details</h5>
        <button type="button" class="btn-close" onclick="closeSidePanel()"></button>
      </div>
      <div class="side-panel-body">
        <div class="text-center mb-4">
          <div class="lead-avatar mx-auto" style="width: 80px; height: 80px; font-size: 2rem; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
            AM
          </div>
          <h5 class="mt-3">Alice Martinez</h5>
          <p class="text-muted mb-1">Tech Innovations Ltd</p>
          <span class="lead-status status-new">New Lead</span>
        </div>
        
        <div class="detail-section">
          <h6><i class="bi bi-person-badge me-2"></i>Contact Information</h6>
          <div class="detail-row">
            <span class="detail-label">Email:</span>
            <span class="detail-value">alice.martinez@techinnovations.com</span>
          </div>
          <div class="detail-row">
            <span class="detail-label">Phone:</span>
            <span class="detail-value">+234 801 123 4567</span>
          </div>
          <div class="detail-row">
            <span class="detail-label">Source:</span>
            <span class="detail-value">Website</span>
          </div>
            <div class="detail-row">
              <span class="detail-label">Referral Code:</span>
              <span class="detail-value" id="detailReferralCode">REF-ALC001</span>
            </div>
          <div class="detail-row">
            <span class="detail-label">Lead Value:</span>
            <span class="detail-value text-success fw-bold">₦2,500,000</span>
          </div>
        </div>
        
        <div class="detail-section">
          <h6><i class="bi bi-building me-2"></i>Company Information</h6>
          <div class="detail-row">
            <span class="detail-label">Industry:</span>
            <span class="detail-value">Technology</span>
          </div>
          <div class="detail-row">
            <span class="detail-label">Size:</span>
            <span class="detail-value">50-100 employees</span>
          </div>
          <div class="detail-row">
            <span class="detail-label">Location:</span>
            <span class="detail-value">Lagos, Nigeria</span>
          </div>
        </div>
        
        <div class="detail-section">
          <h6><i class="bi bi-clock-history me-2"></i>Activity Timeline</h6>
          <div class="activity-timeline">
            <div class="activity-item">
              <div class="activity-icon">
                <i class="bi bi-plus-circle-fill"></i>
              </div>
              <div class="activity-content">
                <div class="activity-title">Lead Created</div>
                <div class="activity-time">Dec 3, 2025 at 10:30 AM</div>
              </div>
            </div>
            <div class="activity-item">
              <div class="activity-icon">
                <i class="bi bi-envelope-fill"></i>
              </div>
              <div class="activity-content">
                <div class="activity-title">Welcome Email Sent</div>
                <div class="activity-time">Dec 3, 2025 at 10:32 AM</div>
              </div>
            </div>
            <div class="activity-item">
              <div class="activity-icon">
                <i class="bi bi-eye-fill"></i>
              </div>
              <div class="activity-content">
                <div class="activity-title">Viewed Profile</div>
                <div class="activity-time">Dec 3, 2025 at 11:15 AM</div>
              </div>
            </div>
          </div>
        </div>
        
        <div class="d-grid gap-2">
          <button class="btn btn-primary" onclick="contactLead()">
            <i class="bi bi-telephone-fill me-2"></i>Contact Lead
          </button>
          <button class="btn btn-outline-primary" onclick="updateLeadStatus()">
            <i class="bi bi-arrow-right-circle-fill me-2"></i>Update Status
          </button>
          <button class="btn btn-outline-secondary" onclick="editLead()">
            <i class="bi bi-pencil-fill me-2"></i>Edit Lead
          </button>
        </div>
      </div>
    </div>
    
    <!-- Add BRM Side Panel -->
    <div class="panel-overlay-brm" id="panelOverlayBRM" onclick="closeAddBRMPanel()"></div>
    <div class="add-brm-panel" id="addBRMPanel">
      <div class="add-brm-panel-header">
        <div class="d-flex justify-content-between align-items-center">
          <h5 class="mb-0"><i class="bi bi-person-plus-fill me-2"></i>Add New BRM</h5>
          <button class="btn btn-sm btn-light" onclick="closeAddBRMPanel()">
            <i class="bi bi-x-lg"></i>
          </button>
        </div>
      </div>
      <div class="add-brm-panel-body">
        <form id="addBRMForm">
          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label fw-semibold">Full Name *</label>
              <input type="text" class="form-control" id="brmFullName" required>
            </div>
            <div class="col-md-6">
              <label class="form-label fw-semibold">Company *</label>
              <input type="text" class="form-control" id="brmCompany" required>
            </div>
            <div class="col-md-6">
              <label class="form-label fw-semibold">Email *</label>
              <input type="email" class="form-control" id="brmEmail" required>
            </div>
            <div class="col-md-6">
              <label class="form-label fw-semibold">Phone *</label>
              <input type="tel" class="form-control" id="brmPhone" required>
            </div>
            <div class="col-md-6">
              <label class="form-label fw-semibold">Lead Source *</label>
              <select class="form-select" id="brmSource" required>
                <option value="">Select Source</option>
                <option value="Website">Website</option>
                <option value="Referral">Referral</option>
                <option value="Social Media">Social Media</option>
                <option value="Event">Event</option>
                <option value="Cold Call">Cold Call</option>
                <option value="Partnership">Partnership</option>
              </select>
            </div>
            <div class="col-md-6">
              <label class="form-label fw-semibold">Lead Value (₦)</label>
              <input type="number" class="form-control" id="brmValue" placeholder="0.00">
            </div>
            <div class="col-md-6">
              <label class="form-label fw-semibold">Industry</label>
              <input type="text" class="form-control" id="brmIndustry" placeholder="e.g., Technology">
            </div>
            <div class="col-md-6">
              <label class="form-label fw-semibold">Company Size</label>
              <select class="form-select" id="brmCompanySize">
                <option value="">Select Size</option>
                <option value="1-10">1-10 employees</option>
                <option value="11-50">11-50 employees</option>
                <option value="51-100">51-100 employees</option>
                <option value="100+">100+ employees</option>
              </select>
            </div>
            <div class="col-12">
              <label class="form-label fw-semibold">Location</label>
              <input type="text" class="form-control" id="brmLocation" placeholder="City, Country">
            </div>
            <div class="col-md-6">
              <label class="form-label fw-semibold">Referral Code</label>
              <div class="input-group">
                <input type="text" class="form-control" id="brmReferralCode" placeholder="e.g., REF-ABC123" readonly>
                <button type="button" class="btn btn-outline-secondary" onclick="document.getElementById('brmReferralCode').value = generateReferralCode()">Generate</button>
              </div>
              <small class="text-muted">Automatically generated code for tracking referrals (editable if needed)</small>
            </div>
            <div class="col-12">
              <label class="form-label fw-semibold">Notes</label>
              <textarea class="form-control" id="brmNotes" rows="4" placeholder="Additional information about this lead..."></textarea>
            </div>
          </div>
          
          <div class="d-flex gap-2 mt-4">
            <button type="button" class="btn btn-secondary flex-fill" onclick="closeAddBRMPanel()">
              <i class="bi bi-x-circle me-2"></i>Cancel
            </button>
            <button type="button" class="btn btn-primary flex-fill" onclick="saveBRM()">
              <i class="bi bi-check-circle-fill me-2"></i>Create BRM
            </button>
          </div>
        </form>
      </div>
    </div>
    
    <script src="../Manager/assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="../Manager/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../Manager/assets/js/off-canvas.js"></script>
    <script src="../Manager/assets/js/template.js"></script>
    <script src="../Manager/assets/js/settings.js"></script>
    <script src="../Manager/assets/js/hoverable-collapse.js"></script>
    <script src="../Manager/assets/js/todolist.js"></script>
    <?php include 'layouts/sidebar_scripts.php'; ?>
    
    <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Initialize Bootstrap dropdown for user avatar
      setTimeout(function() {
        var userDropdown = document.getElementById('UserDropdown');
        var dropdownMenu = document.querySelector('.dropdown-menu[aria-labelledby="UserDropdown"]');
        if (userDropdown && dropdownMenu && typeof bootstrap !== 'undefined' && bootstrap.Dropdown) {
          try { 
            new bootstrap.Dropdown(userDropdown, { autoClose: true, boundary: 'viewport' }); 
          } catch (error) { 
            console.error('Dropdown initialization error:', error); 
          }
        }
        
        // Initialize sidebar collapse behavior
        var sidebar = document.getElementById('sidebar');
        if (sidebar) {
          sidebar.querySelectorAll('a.nav-link[data-bs-toggle="collapse"]').forEach(function (toggle) {
            toggle.addEventListener('click', function (e) {
              e.preventDefault();
              var target = document.querySelector(this.getAttribute('href'));
              if (target && typeof bootstrap !== 'undefined' && bootstrap.Collapse) {
                sidebar.querySelectorAll('div.collapse.show').forEach(function (m) { 
                  if (m !== target) bootstrap.Collapse.getOrCreateInstance(m).hide(); 
                });
                bootstrap.Collapse.getOrCreateInstance(target).toggle();
              }
            });
          });
        }
      }, 500);
      
      // Search functionality
      document.getElementById('searchInput').addEventListener('input', function(e) {
        const searchTerm = e.target.value.toLowerCase();
        const leadCards = document.querySelectorAll('.lead-card');
        leadCards.forEach(card => {
          const text = card.textContent.toLowerCase();
          card.style.display = text.includes(searchTerm) ? '' : 'none';
        });
      });
    });
    
    function showLeadDetails(leadId) {
      const panel = document.getElementById('leadDetailsPanel');
      const overlay = document.getElementById('sidePanelOverlay');
      
      panel.classList.add('active');
      overlay.classList.add('active');
      document.body.style.overflow = 'hidden';
    }
    
    function closeSidePanel() {
      const panel = document.getElementById('leadDetailsPanel');
      const overlay = document.getElementById('sidePanelOverlay');
      
      panel.classList.remove('active');
      overlay.classList.remove('active');
      document.body.style.overflow = '';
    }
    
    function contactLead(leadId) {
      console.log('Contact lead:', leadId);
      // Implementation for contact functionality
    }
    
    function updateLeadStatus(leadId) {
      console.log('Update lead status:', leadId);
      // Implementation for status update
    }
    
    function editLead(leadId) {
      console.log('Edit lead:', leadId);
      // Implementation for edit functionality
    }
    
    function openAddBRMPanel() {
      // generate a default referral code when opening
      var codeField = document.getElementById('brmReferralCode');
      if (codeField && !codeField.value) codeField.value = generateReferralCode();
      document.getElementById('addBRMPanel').classList.add('show');
      document.getElementById('panelOverlayBRM').classList.add('show');
      document.body.style.overflow = 'hidden';
    }
    
    function closeAddBRMPanel() {
      document.getElementById('addBRMPanel').classList.remove('show');
      document.getElementById('panelOverlayBRM').classList.remove('show');
      document.body.style.overflow = 'auto';
      // Reset form
      document.getElementById('addBRMForm').reset();
    }
    
    function saveBRM() {
      const form = document.getElementById('addBRMForm');
      if (form.checkValidity()) {
        const brm = {
          name: document.getElementById('brmFullName').value,
          company: document.getElementById('brmCompany').value,
          email: document.getElementById('brmEmail').value,
          phone: document.getElementById('brmPhone').value,
          source: document.getElementById('brmSource').value,
          value: document.getElementById('brmValue').value,
          industry: document.getElementById('brmIndustry').value,
          companySize: document.getElementById('brmCompanySize').value,
          location: document.getElementById('brmLocation').value,
          notes: document.getElementById('brmNotes').value,
          referralCode: document.getElementById('brmReferralCode').value || ''
        };

        console.log('Save new BRM', brm);
        alert('BRM contact created successfully!\nReferral Code: ' + brm.referralCode);

        // Update UI placeholders: set detail panel referral code for demo
        var detailRef = document.getElementById('detailReferralCode');
        if (detailRef) detailRef.textContent = brm.referralCode || '-';

        // TODO: send `brm` to server via AJAX / form submission
        closeAddBRMPanel();
      } else {
        form.reportValidity();
      }
    }

    // Utility to generate a short referral code
    function generateReferralCode() {
      var chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
      var out = 'REF-';
      for (var i = 0; i < 6; i++) out += chars.charAt(Math.floor(Math.random() * chars.length));
      return out;
    }
    
    function exportLeads() {
      console.log('Export leads to CSV');
      // Implementation for CSV export
    }
    
    function refreshLeads() {
      console.log('Refresh leads');
      location.reload();
    }
    </script>
  </body>
</html>
