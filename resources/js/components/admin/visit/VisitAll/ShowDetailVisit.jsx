import React from 'react';
export default function ShowDetailVisit({ShowDetail}) {
    return (
        <React.Fragment>
            <a id="BtnShow" type="button" data-toggle="modal"
               data-target={'#Show'}
               className="btn btn-info btn-sm text-white d-none">
                <i style={{ margin : 'inherit'}}>نمایش</i>
            </a>
            <div className="modal fade"  id="Show">
                <div className="modal-lg modal-dialog cascading-modal" role="document">
                    <div  style={{ height : '100%' }} className="modal-content">
                        <table className="table table-hover ">
                                <thead>
                                    <tr style={{ backgroundColor:'#343a40' }}>
                                        <th className="text-center text-light" scope="col">ردیف</th>
                                        <th className="text-center text-light" scope="col">تاریخ</th>
                                        <th className="text-center text-light" scope="col">ip</th>
                                        <th className="text-center text-light" scope="col">لینک</th>
                                        <th className="text-center text-light" scope="col">مرورگر</th>
                                        <th className="text-center text-light" scope="col">پلتفرم</th>
                                    </tr>
                                </thead>
                            <tbody>
                            {
                                ShowDetail!=null?
                                    ShowDetail.map((item, index) => (
                                        <tr className="item" key={index}>
                                            <td className="text-center font-weight-bold ">{ index+1 }</td>
                                            <td className="text-center font-weight-bold ">{ item.CreateHour+' '+item.Create_Date }</td>
                                            <td className="text-center font-weight-bold ">{ item.ip }</td>
                                            <td className="text-center font-weight-bold ">{ item.url }</td>
                                            <td className="text-center font-weight-bold ">{ item.browser }</td>
                                            <td className="text-center font-weight-bold ">{ item.platform }</td>
                                        </tr>
                                    ))
                                    :null
                            }
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </React.Fragment>
    );
}
