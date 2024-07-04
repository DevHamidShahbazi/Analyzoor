import React from 'react';
export default function Loading(props) {
    return (
        <React.Fragment>
            <div className="d-flex justify-content-center align-items-center"
                 style={{height:'100vh'}}>
                <div className="loader"/>
            </div>
        </React.Fragment>
    );
}
