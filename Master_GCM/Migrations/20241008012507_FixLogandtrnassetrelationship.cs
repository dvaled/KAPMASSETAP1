using Microsoft.EntityFrameworkCore.Migrations;
using Npgsql.EntityFrameworkCore.PostgreSQL.Metadata;

#nullable disable

namespace Master_GCM.Migrations
{
    /// <inheritdoc />
    public partial class FixLogandtrnassetrelationship : Migration
    {
        /// <inheritdoc />
        protected override void Up(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.DropForeignKey(
                name: "FK_TRN_ASSET_TRN_LOG_IDASSET",
                table: "TRN_ASSET");

            migrationBuilder.DropForeignKey(
                name: "FK_TRN_DTL_PICTURE_TRN_ASSET_IDASSET",
                table: "TRN_DTL_PICTURE");

            migrationBuilder.DropIndex(
                name: "IX_TRN_DTL_PICTURE_IDASSET",
                table: "TRN_DTL_PICTURE");

            migrationBuilder.AlterColumn<int>(
                name: "IDASSET",
                table: "TRN_ASSET",
                type: "integer",
                nullable: false,
                oldClrType: typeof(int),
                oldType: "integer")
                .Annotation("Npgsql:ValueGenerationStrategy", NpgsqlValueGenerationStrategy.IdentityByDefaultColumn);

            migrationBuilder.CreateIndex(
                name: "IX_TRN_LOG_IDASSET",
                table: "TRN_LOG",
                column: "IDASSET",
                unique: true);

            migrationBuilder.AddForeignKey(
                name: "FK_TRN_LOG_TRN_ASSET_IDASSET",
                table: "TRN_LOG",
                column: "IDASSET",
                principalTable: "TRN_ASSET",
                principalColumn: "IDASSET",
                onDelete: ReferentialAction.Cascade);
        }

        /// <inheritdoc />
        protected override void Down(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.DropForeignKey(
                name: "FK_TRN_LOG_TRN_ASSET_IDASSET",
                table: "TRN_LOG");

            migrationBuilder.DropIndex(
                name: "IX_TRN_LOG_IDASSET",
                table: "TRN_LOG");

            migrationBuilder.AlterColumn<int>(
                name: "IDASSET",
                table: "TRN_ASSET",
                type: "integer",
                nullable: false,
                oldClrType: typeof(int),
                oldType: "integer")
                .OldAnnotation("Npgsql:ValueGenerationStrategy", NpgsqlValueGenerationStrategy.IdentityByDefaultColumn);

            migrationBuilder.CreateIndex(
                name: "IX_TRN_DTL_PICTURE_IDASSET",
                table: "TRN_DTL_PICTURE",
                column: "IDASSET");

            migrationBuilder.AddForeignKey(
                name: "FK_TRN_ASSET_TRN_LOG_IDASSET",
                table: "TRN_ASSET",
                column: "IDASSET",
                principalTable: "TRN_LOG",
                principalColumn: "LOGID",
                onDelete: ReferentialAction.Cascade);

            migrationBuilder.AddForeignKey(
                name: "FK_TRN_DTL_PICTURE_TRN_ASSET_IDASSET",
                table: "TRN_DTL_PICTURE",
                column: "IDASSET",
                principalTable: "TRN_ASSET",
                principalColumn: "IDASSET",
                onDelete: ReferentialAction.Cascade);
        }
    }
}
