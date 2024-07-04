import React from 'react';
import {Pie} from "react-chartjs-2";

export default function  PieShow({VisitIp}) {
    const dataPie = {
        labels: ['کل بازدید ها', 'تعداد بازدید خالص'],
        datasets: [
            {
                label: 'نفر',
                data: [VisitIp?VisitIp.repeat:0, VisitIp?VisitIp.dont_repeat:0],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                ],
                borderWidth: 1,
            },
        ],
    };
    return (
        <React.Fragment>
            <div className="col-12">
                <div className="d-flex justify-content-around">
                    <div className="col-md-3">
                        <Pie data={dataPie} />
                    </div>
                </div>
            </div>
        </React.Fragment>
    );
}
