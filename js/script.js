// script.js

document.addEventListener('DOMContentLoaded', function () {
    // Get the product type field and type-specific fields
    var productTypeField = document.getElementById('productType');
    var dvdFields = document.getElementById('dvdFields');
    var bookFields = document.getElementById('bookFields');
    var furnitureFields = document.getElementById('furnitureFields');
  
    // Show/hide type-specific fields based on selected product type
    function toggleTypeFields() {
        var selectedType = productTypeField.value;
    
        dvdFields.classList.toggle('hidden', selectedType !== 'DVD');
        bookFields.classList.toggle('hidden', selectedType !== 'Book');
        furnitureFields.classList.toggle('hidden', selectedType !== 'Furniture');
    }
  
    // Add event listener for product type field change
    productTypeField.addEventListener('change', toggleTypeFields);
  
    // Toggle type-specific fields on page load
    toggleTypeFields();
});
  