
    let formData = {
        head: "",
        attachment: "",
        steps: []
    };

    function updateFormData() {
    const headerInput = document.getElementById('name1');
    const headerAttachmentInput = document.getElementById('attachment');
    const formSets = document.querySelectorAll('#dynamic-form-sections .form-set');

    formData.head = headerInput.value;

    const headerFile = headerAttachmentInput.files[0];
    formData.attachment = headerFile ? headerFile.name : "";

    const headerImagePromise = new Promise((resolve) => {
        if (headerFile) {
            const reader = new FileReader();
            reader.onload = e => resolve(e.target.result);
            reader.readAsDataURL(headerFile);
        } else {
            resolve(null);
        }
    });

    formData.steps = [];
    const stepImagePromises = [];

    formSets.forEach((set, index) => {
        const stepTitle = set.querySelector('input[name="headers[]"]').value;
        const stepFileInput = set.querySelector('input[name="attachments[]"]');
        const stepFile = stepFileInput.files[0];
        const stepDescription = set.querySelector('textarea[name="descriptions[]"]').value;

        const stepData = {
            step: index + 1,
            title: stepTitle,
            attachment: stepFile ? stepFile.name : "",
            description: stepDescription,
            imageUrl: null
        };

        formData.steps.push(stepData);

        // Handle image loading
        const stepImagePromise = new Promise((resolve) => {
            if (stepFile) {
                const reader = new FileReader();
                reader.onload = e => {
                    stepData.imageUrl = e.target.result;
                    resolve();
                };
                reader.readAsDataURL(stepFile);
            } else {
                resolve();
            }
        });

        stepImagePromises.push(stepImagePromise);
    });

    // Wait for header + all step images to load
    headerImagePromise.then(headerImgUrl => {
        Promise.all(stepImagePromises).then(() => {
            renderStyledPreview(headerImgUrl);
            document.getElementById('formPreview').textContent = JSON.stringify(formData, null, 2);
        });
    });


        console.log("Updated form data:", formData);
}

function renderStyledPreview(headerImgUrl) {
    const styledEl = document.getElementById('styledPreview');
    if (!styledEl) return;

    let html = `<h2>${formData.head}</h2>`;

    if (headerImgUrl) {
        html += `<div><img src="${headerImgUrl}" alt="Header Image" style="max-width:100%; height:auto; margin-bottom:1rem;" /></div>`;
    }

    html += '<hr><h4>Steps</h4>';

    formData.steps.forEach((step, index) => {
        html += `
            <div class="${index !== 0 ? 'page-break' : ''} mb-4">
                <h5>Step ${step.step}: ${step.title}</h5>
                ${step.imageUrl ? `<img src="${step.imageUrl}" alt="Step Image" style="max-width:100%; height:auto; margin-bottom:1rem;" />` : ''}
                <p>${step.description}</p>
            </div>
        `;
    });

    styledEl.innerHTML = html;
}



    document.addEventListener('input', function (e) {
    if (e.target.closest('#form1') || e.target.closest('#form2')) {
        updateFormData();
    }
});

document.addEventListener('change', function (e) {
    if (e.target.closest('#form1') || e.target.closest('#form2')) {
        updateFormData();
    }
});

document.getElementById('form3-tab').addEventListener('click', updateFormData);


    document.getElementById('add-form-section').addEventListener('click', function () {
        const container = document.getElementById('dynamic-form-sections');
        const formSets = container.querySelectorAll('.form-set');
        const stepNumber = formSets.length + 1;

        const original = formSets[0];
        const clone = original.cloneNode(true);

        // Clear inputs in the cloned node
        clone.querySelectorAll('input, textarea').forEach(input => input.value = '');
        clone.querySelector('.step-label').textContent = 'Step ' + stepNumber;

        container.appendChild(clone);

        updateFormData(); // Update after new section added
    });


document.getElementById('download-pdf').addEventListener('click', function () {
    const element = document.getElementById('styledPreview');
    
    const opt = {
        margin:       0.5,
        filename:     'form-preview.pdf',
        image:        { type: 'jpeg', quality: 0.98 },
        html2canvas:  { scale: 2 },
        jsPDF:        { unit: 'in', format: 'letter', orientation: 'portrait' }
    };

    html2pdf().set(opt).from(element).save();
});
