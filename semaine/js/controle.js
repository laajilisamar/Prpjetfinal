function updateEndDateMin(startDate) {
    const endDateInput = document.getElementById('EndDate');
    const startDateObj = new Date(startDate);
    const endDate = new Date(startDateObj.getTime() + (7 * 24 * 60 * 60 * 1000)); // Adding 7 days in milliseconds

    const formattedEndDate = endDate.toISOString().split('T')[0]; // Format as YYYY-MM-DD
    endDateInput.setAttribute('min', formattedEndDate);
    endDateInput.removeAttribute('disabled');
}