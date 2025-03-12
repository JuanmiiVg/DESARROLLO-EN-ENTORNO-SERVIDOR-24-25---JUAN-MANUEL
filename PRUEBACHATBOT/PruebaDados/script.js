document.getElementById('rollButton').addEventListener('click', function() {
    const dice = document.getElementById('dice');
    dice.style.animation = 'roll 2s ease-in-out forwards';
    
    // Reset animation after it completes
    setTimeout(() => {
        dice.style.animation = 'none';
    }, 2000);
});