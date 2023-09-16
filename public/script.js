document.addEventListener('DOMContentLoaded', function () {
    const examples = document.querySelectorAll('.example');
    
    examples.forEach(example => {
        const toggleButton = document.createElement('button');
        toggleButton.textContent = 'Toggle';
        toggleButton.classList.add('toggle-button');
        
        toggleButton.addEventListener('click', () => {
            const codeBlock = example.querySelector('.code');
            codeBlock.classList.toggle('hidden');
        });
        
        example.appendChild(toggleButton);
    });
});
