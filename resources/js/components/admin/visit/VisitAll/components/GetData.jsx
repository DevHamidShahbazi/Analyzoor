import React from 'react';
import axios from "axios";
export default function GetData(setVisits) {
    axios.post('admin-panel/visit')
        .then(response => {
            const {data} = response;
            setVisits(data.visit);
        })
        .catch(error => {
            console.log(error)
        });
}
