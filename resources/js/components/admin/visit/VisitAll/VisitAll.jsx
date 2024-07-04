import React,{useState,useEffect} from 'react';
import {Line} from 'react-chartjs-2';
import {Chart as ChartJS, CategoryScale, LinearScale, PointElement, LineElement, Title, Tooltip, Filler, Legend, ArcElement} from 'chart.js';
ChartJS.register(CategoryScale, LinearScale, PointElement, LineElement, Title, Tooltip, Filler, Legend,ArcElement);
import {Options,data} from "./components/Options";
import GetData from "./components/GetData";
import Loading from "../../../global/Loading";
import PieShow from "./components/PieShow";
import ShowDetailVisit from "./ShowDetailVisit";
export default function VisitAll() {
    const [ShowDetail,setShowDetail] = useState(null);
    const [Visits,setVisits] = useState(null);
    useEffect(()=>{
        GetData(setVisits)
    },[]);
    return (
        <React.Fragment>
            <ShowDetailVisit ShowDetail={ShowDetail}/>
            {Visits?<Line options={Options(Visits,setShowDetail)} data={data(Visits)}/>:<Loading/>}
        </React.Fragment>
    );
}
