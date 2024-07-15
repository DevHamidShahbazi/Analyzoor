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

export function GetLocation(ip,index,setLoading,setLocation,Location) {
    setLocation({
        'index':index
    });
    setLoading(true);
    axios.post('admin-panel/visit/location',{
        'ip':ip,
    })
        .then(response => {
            const {data} = response;
            setLocation({
                'city':data,
                'index':index
            });
            setLoading(false);
        })
        .catch(error => {
            console.log(error)
        });
}
