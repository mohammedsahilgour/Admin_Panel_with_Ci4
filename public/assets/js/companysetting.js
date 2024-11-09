document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('patientForm');
    const sections = document.querySelectorAll('.form-section');
    const progressBar = document.querySelector('.progress');
    const steps = document.querySelectorAll('.step');
    let currentSection = 0;

    // Update progress bar
    function updateProgress() {
        const progress = ((currentSection) / (sections.length - 1)) * 100;
        progressBar.style.width = `${progress}%`;
        
        steps.forEach((step, idx) => {
            if (idx <= currentSection) {
                step.classList.add('active');
                if (idx < currentSection) {
                    step.classList.add('completed');
                }
            } else {
                step.classList.remove('active', 'completed');
            }
        });
    }

    // Navigation functions
    function showSection(n) {
        sections.forEach(section => section.classList.remove('active'));
        sections[n].classList.add('active');
        currentSection = n;
        updateProgress();

        // Update button states
        const prevBtn = document.querySelectorAll('.btn-prev');
        const nextBtn = document.querySelectorAll('.btn-next');
        
        prevBtn.forEach(btn => {
            btn.disabled = currentSection === 0;
        });
        
        nextBtn.forEach(btn => {
            btn.disabled = currentSection === sections.length - 1;
        });
    }

    // Event listeners for navigation buttons
    document.querySelectorAll('.btn-next').forEach(btn => {
        btn.addEventListener('click', () => {
            if (currentSection < sections.length - 1) {
                showSection(currentSection + 1);
            }
        });
    });

    document.querySelectorAll('.btn-prev').forEach(btn => {
        btn.addEventListener('click', () => {
            if (currentSection > 0) {
                showSection(currentSection - 1);
            }
        });
    });

    // Form submission
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Add your form submission logic here
        
        // Show success message
        const successMessage = document.querySelector('.success-message');
        successMessage.style.display = 'block';
        
        // Hide form sections
        sections.forEach(section => section.style.display = 'none');
        
        // Hide progress bar
        document.querySelector('.progress-bar-company-section').style.display = 'none';
    });

    // Initialize
    showSection(0);
});