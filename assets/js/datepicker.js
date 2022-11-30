import datepicker from 'js-datepicker';

$(function() {

    if ($('body').hasClass('page-template-page-events')) {
        const start = datepicker('#event_date_start', { 
            formatter: (input, date, instance) => {
                const value = date.toLocaleDateString()
                input.value = value 
            },
            id: 1
        });
        const end = datepicker('#event_date_end', {
            formatter: (input, date, instance) => {
                const value = date.toLocaleDateString()
                input.value = value 
            },
            id: 1
        });
    }

});