import './bootstrap';
   // Get the close button and floating window elements
   const closeButton = document.getElementById('close-button');
   const floatingWindow = document.getElementById('floating-window');
   // Close the floating window when the close button is clicked
   closeButton.addEventListener('click', () => {
      floatingWindow.style.display = 'none';
   });
   
   
