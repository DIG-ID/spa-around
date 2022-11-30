import datepicker from 'js-datepicker';

$(function() {

    if ($('body').hasClass('page-template-page-events')) {
        const start = datepicker('#event_date_start', { 
            formatter: (input, date, instance) => {
                const value = date.toLocaleDateString()
                input.value = value 
            },
            onSelect: (instance, date) => {
                $('#event_date_start').attr('data-start',Math.floor(new Date(date).getTime() / 1000));
            },
            id: 1
        });
        const end = datepicker('#event_date_end', {
            formatter: (input, date, instance) => {
                const value = date.toLocaleDateString()
                input.value = value 
            },
            onSelect: (instance, date) => {
                $('#event_date_end').attr('data-end',Math.floor(new Date(date).getTime() / 1000));
            },
            id: 1
        });
    }

});