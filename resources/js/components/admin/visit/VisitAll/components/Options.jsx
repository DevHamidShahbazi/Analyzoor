export const Options = (Visits,setShowDetail) => {
    return {
        responsive: true,
        onClick: (e, elements) => {
            if (elements.length){
                const index = elements[0].index;
                const number =Object.values(Visits.all);
                number.map((item,index2) => {
                    if (index2==index){
                        setShowDetail(item);
                        $('#BtnShow').click();
                    }
                } )
            }
        },
        plugins: {
            legend: {
                position: 'top',
            },
        },
    }
};
export const data = (Visits) => {
    const labels =Object.values(Visits.date);
    const number =Object.values(Visits.all);
    return {
        labels,
        datasets: [
            {
                fill: true,
                label: 'تعداد بازدید',
                data: number.map((item,index) => item.length ),
                borderColor: 'rgb(53, 162, 235)',
                backgroundColor: 'rgba(53, 162, 235, 0.5)',
            },
        ],
    }
};
