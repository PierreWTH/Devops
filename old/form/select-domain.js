// JavaScript to handle select change event
document.getElementById('domaine-select').addEventListener('change', function () {
  // Get selected value
  showOnlyWhatsNeeded(this.value);
});

showOnlyWhatsNeeded(document.getElementById('domaine-select').value);

function showOnlyWhatsNeeded(selectedValue) {

  // Hide all category tbody elements
  var categories = document.querySelectorAll('.category');
  categories.forEach(function (category) {
    category.style.display = 'none';
  });

  // Show the selected category tbody
  var selectedCategory = document.getElementById(selectedValue);
  if (selectedCategory) {
    selectedCategory.style.display = 'table-row-group'; // Display as table row group
  }
}