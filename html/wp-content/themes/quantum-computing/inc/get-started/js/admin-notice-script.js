
// Creta Testimonial Showcase plugin activation
document.addEventListener('DOMContentLoaded', function () {
    const quantum_computing_button = document.getElementById('install-activate-button');

    if (!quantum_computing_button) return;

    quantum_computing_button.addEventListener('click', function (e) {
        e.preventDefault();

        const quantum_computing_redirectUrl = quantum_computing_button.getAttribute('data-redirect');

        // Step 1: Check if plugin is already active
        const quantum_computing_checkData = new FormData();
        quantum_computing_checkData.append('action', 'check_creta_testimonial_activation');

        fetch(installcretatestimonialData.ajaxurl, {
            method: 'POST',
            body: quantum_computing_checkData,
        })
        .then(res => res.json())
        .then(res => {
            if (res.success && res.data.active) {
                // Plugin is already active → just redirect
                window.location.href = quantum_computing_redirectUrl;
            } else {
                // Not active → proceed with install + activate
                quantum_computing_button.textContent = 'Nevigate Getstart';

                const quantum_computing_installData = new FormData();
                quantum_computing_installData.append('action', 'install_and_activate_creta_testimonial_plugin');
                quantum_computing_installData.append('_ajax_nonce', installcretatestimonialData.nonce);

                fetch(installcretatestimonialData.ajaxurl, {
                    method: 'POST',
                    body: quantum_computing_installData,
                })
                .then(res => res.json())
                .then(res => {
                    if (res.success) {
                        window.location.href = quantum_computing_redirectUrl;
                    } else {
                        alert('Activation error: ' + (res.data?.message || 'Unknown error'));
                        quantum_computing_button.textContent = 'Try Again';
                    }
                })
                .catch(error => {
                    alert('Request failed: ' + error.message);
                    quantum_computing_button.textContent = 'Try Again';
                });
            }
        })
        .catch(error => {
            alert('Check request failed: ' + error.message);
        });
    });
});
