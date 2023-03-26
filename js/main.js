const timeComp = document.querySelector(".time");
const dateComp = document.querySelector(".date");

/**
 * @param {Date} date
 */

function formatTime(date){
    
    const hours = date.getHours();
    const minutes = date.getMinutes();
    return `${hours.toString().padStart(2,"0")}:${minutes.toString().padStart(2,"0")}`;
}

function formatDate(date){

   const months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
   const days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday','Sunday'];
    return `${days[date.getDay()]}, ${date.getDate() + '.'} ${months[date.getMonth()]} ${date.getFullYear() + '.'}`;
   
}

setInterval(() => {
    const now = new Date()

    timeComp.textContent = formatTime(now);
    dateComp.textContent = formatDate(now);
},200);