import React from 'react';
import ReactDOM from 'react-dom';
import { createRoot } from 'react-dom/client';
axios.defaults.baseURL = 'https://fanoram.ir/';
// axios.defaults.baseURL = 'http://localhost:8000/';
import VisitAll from "./VisitAll/VisitAll";
export function Chart () {
    return <VisitAll/>;
}
if (document.getElementById('visits')) {
    const container = document.getElementById('visits');
    const root = createRoot(container); // createRoot(container!) if you use TypeScript
    root.render(<Chart />);

}


