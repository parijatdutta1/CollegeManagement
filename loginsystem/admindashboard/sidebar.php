<!-- sidebar.php -->
<?php 
// Start the session if not already started

    session_start();


// Determine the current section from the URL, defaulting to 'welcome'
$current_section = $_GET['section'] ?? 'welcome';

// Helper function to output the active class when a section matches
function is_active($section, $current_section) {
  return $section === $current_section ? 'active' : '';
}
?>
<link rel="stylesheet" href="assets/css/sidebarstyles.css">
  <!-- ✅ FIXED: Sidebar -->
  <div class="admin-sidebar-custom">
    <a href="index.php?section=welcome" class="<?= is_active('welcome', $current_section) ?>">Home</a>
    <a href="index.php?section=add_college" class="<?= is_active('add_college', $current_section) ?>">Add College</a>
    <a href="index.php?section=create_role" class="<?= is_active('create_role', $current_section) ?>">Create Role</a>
    <a href="index.php?section=view_colleges" class="<?= is_active('view_colleges', $current_section) ?>">View Existing Colleges</a>
    <a href="index.php?section=edit_faculty" class="<?= is_active('edit_faculty', $current_section) ?>">Edit Faculty Data</a>
    <a href="index.php?section=edit_principal" class="<?= is_active('edit_principal', $current_section) ?>">Edit Principal Data</a>
    <a href="index.php?section=add_faculty" class="<?= is_active('add_faculty', $current_section) ?>">Add Faculty</a>
    <a href="index.php?section=applyresponse" class="<?= is_active('applyresponse', $current_section) ?>">Recent Queries</a>
    <a href="index.php?section=allqueries" class="<?= is_active('allqueries', $current_section) ?>">All Queries</a>
    <a href="index.php?section=addevent" class="<?= is_active('addevent', $current_section) ?>">Add Events</a>
    <a href="index.php?section=inquiries" class="<?= is_active('inquiries', $current_section) ?>">Inquiries</a>
    <a href="index.php?section=project_proposals" class="<?= is_active('project_proposals', $current_section) ?>">Project Proposals</a>
    <a href="index.php?section=progress_reports" class="<?= is_active('progress_reports', $current_section) ?>">Progress Reports</a>
    <a href="index.php?section=edit_colleges" class="<?= is_active('edit_colleges', $current_section) ?>">Edit Colleges Data</a>
  </div>
 <!-- ✅ FIXED: Main Content -->
 <div class="admin-content-custom">
    <?php
      $file = "content/$current_section.php";

      if (file_exists($file)) {
          include $file;
      } else {
          echo "<h1>Section not found</h1>";
      }
    ?>
  </div>
<!-- ✅ Auto-scroll to active sidebar item -->
<script>
document.addEventListener("DOMContentLoaded", function() {
    const activeLink = document.querySelector('.admin-sidebar-custom a.active');
    if (activeLink) {
        activeLink.scrollIntoView({ behavior: 'smooth', block: 'center' });
    }
});
</script>


