const draggables = document.querySelectorAll('.draggable');
const dropArea = document.getElementById('drop-area');
const menu = document.getElementById('menu');

// Add drag event listeners to make items draggable
draggables.forEach(draggable => {
  draggable.addEventListener('dragstart', (e) => {
    e.target.classList.add('dragging');
  });

  draggable.addEventListener('dragend', (e) => {
    e.target.classList.remove('dragging');
  });
});

// Function to handle reordering within the menu and drop area
function handleReorder(container) {
  const items = [...container.querySelectorAll('.draggable')];

  items.forEach(item => {
    item.addEventListener('dragover', (e) => {
      e.preventDefault();
      const draggingElement = container.querySelector('.dragging');
      const currentElement = e.target;

      // Don't move if it's the same element
      if (currentElement !== draggingElement && currentElement.classList.contains('draggable')) {
        const rect = currentElement.getBoundingClientRect();
        const middle = rect.top + rect.height / 2;

        // Insert the dragged element before or after the current element
        if (e.clientY > middle) {
          currentElement.after(draggingElement);
        } else {
          currentElement.before(draggingElement);
        }
      }
    });

    // Add visual feedback when dragging over
    item.addEventListener('dragenter', (e) => {
      e.preventDefault();
      item.classList.add('over');
    });

    item.addEventListener('dragleave', () => {
      item.classList.remove('over');
    });
  });
}

// Allow items to be dropped into the drop area
dropArea.addEventListener('dragover', (e) => {
  e.preventDefault();
  dropArea.classList.add('over');
});

dropArea.addEventListener('dragleave', () => {
  dropArea.classList.remove('over');
});

dropArea.addEventListener('drop', (e) => {
  e.preventDefault();
  dropArea.classList.remove('over');
  
  const draggedElement = document.querySelector('.dragging');
  dropArea.appendChild(draggedElement);
  
  // Reapply reordering logic to the drop area
  handleReorder(dropArea);
});

// Reapply reordering functionality to the menu
handleReorder(menu);
