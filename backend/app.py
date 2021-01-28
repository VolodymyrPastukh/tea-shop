from flask import Flask, request, jsonify
from flask_restful import Resource, Api
from flask_sqlalchemy import SQLAlchemy

import sys
import os


app = Flask(__name__)
api = Api(app)

app.config['SQLALCHEMY_DATABASE_URI'] = 'mysql+pymysql://{}:{}@{}/{}'.format(
    os.getenv('DB_USER', 'teauser'),
    os.getenv('DB_PASSWORD', 'teapass'),
    os.getenv('DB_HOST', 'mysql'),
    os.getenv('DB_NAME', 'teashop')
)
db = SQLAlchemy(app)

port = 80


class TeaType(db.Model):
    __tablename__ = 'teaTypes'
    id = db.Column(db.Integer, primary_key=True)
    typeTitle = db.Column(db.String(80), unique=True, nullable=False)
    teas = db.relationship('Tea', backref='teaType',
                                lazy='dynamic')

    def __repr__(self):
        return '<TeaType: {}>'.format(self.title)



class Tea(db.Model):
    __tablename__ = 'teas'
    id = db.Column(db.Integer, primary_key=True)
    teaTitle = db.Column(db.String(80),  nullable=False)
    teaPrice = db.Column(db.String(120),  nullable=False)
    existingCount = db.Column(db.Integer, nullable=False)
    teaTypes_id = db.Column(db.Integer, db.ForeignKey('teaTypes.id'))

    def __repr__(self):
        return '<Tea: {}>'.format(self.title)


@app.before_first_request
def create_tables():
    db.drop_all()
    db.create_all()




class TypesFind(Resource):
    def get(self):
        ret = []
        res = TeaType.query.all()
        for type in res:
            ret.append(
                {
                    'typeTitle': type.typeTitle
                }
            )
        return ret, 200

class TeaFind(Resource):
    def get(self):
        ret = []
        res = Tea.query.all()
        for tea in res:
            ret.append(
                {
                    'teaTitle': tea.teaTitle,
                    'teaPrice': tea.teaPrice,
                    'existingCount': tea.existingCount,
                    'teaTypes_id': tea.teaTypes_id
                }
            )
        return ret, 200


api.add_resource(TypesFind, '/teaTypes')
api.add_resource(TeaFind, '/tea')



@app.route("/setup")
def setup():
    types = ["Oolong","Puer","Green","White","Red"]
    tea1 = ["Chinese Wisdom","120$","455","2"]
    tea2 = ["Young Spring Moon","230$","125","2"]
    tea3 = ["Da Hun Pao","550$","234","1"]

    for x in types:
        instance = TeaType(typeTitle=x)
        db.session.add(instance)
        db.session.commit()

    tea1 = Tea(teaTitle="Chinese Wisdom",
                    teaPrice="120$",
                    existingCount="455",
                    teaTypes_id="2")
    db.session.add(tea1)
    db.session.commit()

    tea2 = Tea(teaTitle="Young Spring Moon",
                    teaPrice="234$",
                    existingCount="126",
                    teaTypes_id="2")
    db.session.add(tea2)
    db.session.commit()

    tea3 = Tea(teaTitle="Da Hun Pao",
                    teaPrice="550$",
                    existingCount="233",
                    teaTypes_id="1")
    db.session.add(tea3)
    db.session.commit()

    return jsonify('ok'), 200


@app.route("/newtea", methods=["POST"])
def newtea():
    if not request.json:
        abort(400)
    else:
        teaTitle = request.json.get('teaTitle')
        teaPrice = request.json.get('teaPrice')
        existingCount = request.json.get('existingCount')
        teaTypes_id = request.json.get('teaTypes_id')

        instance = Tea(teaTitle=teaTitle,
                        teaPrice=teaPrice,
                        existingCount=existingCount,
                        teaTypes_id=teaTypes_id)

        db.session.add(instance)
        db.session.commit()
        return jsonify('ok'), 200




if __name__ == '__main__':
    app.run(host='0.0.0.0', port=port, debug=True)
