from flask import Flask
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
    teaTitle = db.Column(db.String(80), unique=True, nullable=False)
    teaPrice = db.Column(db.String(120), unique=True, nullable=False)
    existingCount = db.Column(db.Integer, nullable=False)
    teaTypes_id = db.Column(db.Integer, db.ForeignKey('teaTypes.id'))

    def __repr__(self):
        return '<Tea: {}>'.format(self.title)


@app.before_first_request
def create_tables():
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
if __name__ == '__main__':
    app.run(host='0.0.0.0', port=port, debug=True)
