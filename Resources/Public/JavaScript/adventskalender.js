document.addEventListener('DOMContentLoaded', function() {
    // Nur Schnee anzeigen, wenn der Adventskalender auf der Seite ist
    //const adventskalender = document.querySelector('.tx-adventskalender');
   /* if (!adventskalender) {
        return;
    }*/
    
    const modals = document.querySelectorAll('.modal');
    
    modals.forEach(modal => {
        modal.addEventListener('show.bs.modal', function() {
            const doorIcon = this.querySelector('.display-1');
            if (doorIcon) {
                doorIcon.style.animation = 'bounce 1s ease-in-out';
            }
        });
        
        modal.addEventListener('shown.bs.modal', function() {
            const modalContent = this.querySelector('.modal-content');
            if (modalContent) {
                modalContent.style.animation = 'fadeInUp 0.5s ease';
            }
        });
    });
    
    function createSnowflake() {
        const snowflake = document.createElement('div');
        snowflake.classList.add('snowflake');
        snowflake.innerHTML = '❄';
        snowflake.style.left = Math.random() * 100 + 'vw';
        snowflake.style.animationDuration = (Math.random() * 10 + 10) + 's';
        snowflake.style.opacity = Math.random();
        snowflake.style.fontSize = (Math.random() * 1 + 0.5) + 'em';
        
        document.body.appendChild(snowflake);
        
        setTimeout(() => {
            snowflake.remove();
        }, 20000);
    }
    
    setInterval(createSnowflake, 300);
    
    for (let i = 0; i < 30; i++) {
        setTimeout(createSnowflake, i * 300);
    }
});
